<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\Dokumen;
use App\Models\SuratKeluar;
use File;

class DraftSuratController extends Controller
{
    public function index()
    {
        $surat = SuratKeluar::where('status',3)->orWhere('status',4)->orderBy('updated_at','DESC')->get();
        return view('admin.draftSurat.index',compact('surat'));
    }

    //detail draft
    public function showDraft($id)
    {
        $surat = SuratKeluar::find($id);
        if($surat['status']!=3){
            $dokumen = Dokumen::where('no_regist','=',$id)->get();
            $field = Data::join('template_field','data.id_field','template_field.id_field')
                         ->where('data.no_regist',$id)->get();
            $count = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                                ->where('dokumen.no_regist',$id)
                                ->count();
            return view('admin.draftSurat.show',compact('surat','dokumen','field','count'));
        }
        else{
            return view('dashboard.404'); 
        }
    }

    public function verifikasiDraft($id)
    {   
      DB::beginTransaction();
      try{        
        $surat = SuratKeluar::findOrFail($id);
        $surat->verifikasi = $surat->verifikasi-1;
        if ($surat->verifikasi==1) {
            $surat->status=4;
        }
        $surat->save();
      }
      catch(\Exception $e){
        DB::rollBack();
        return redirect('/draft')->with('error','Gagal Diverifikasi!!');  
      }
      DB::commit();
      return redirect('/draft')->with('sukses','Draft '.$id.' telah diverifikasi');
    }

    //tolak draft
    public function tolakDraft(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        $surat = SuratKeluar::findOrFail($id);
        File::delete('file/draft/'.$surat->nama_file);
        $surat->nama_file=NULL;
        $surat->keterangan = $request->keterangan;
        $surat->status = 2;
        $surat->save($request->all());
      }
      catch(\Exception $e){
        DB::rollBack();
        return redirect('/draft')->with('error','Tolak Draft Gagal Diproses!!');  
      }
      DB::commit();
      return redirect('/draft')->with('info','Draft '.$id.' ditolak karena '.$request->keterangan);
    }

    public function getFile($id)
    {
        $surat = SuratKeluar::find($id);

        if($surat['status']==4){
            $dokumen = Dokumen::where('no_regist','=',$id)->get();
            $field = Data::join('template_field','data.id_field','template_field.id_field')
                         ->where('data.no_regist',$id)->get();
            $count = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                                ->where('dokumen.no_regist',$id)
                                ->count();
            return view('admin.draftSurat.sign',compact('surat','dokumen','field','count'));
        }
        else{
            return view('dashboard.404'); 
        }
    }

    public function sign(Request $request, $id)
    {  
        DB::beginTransaction();
        try{   
            require_once('..\vendor\setasign\setapdf-signer_eval_ioncube_php7.1\library\SetaPDF\Autoload.php');
            $surat = SuratKeluar::find($id);

            // create a Http writer (file name)
            $writer = new \SetaPDF_Core_Writer_Http('../nama_file.pdf', true);                  //SAVE KE LOCAL
            // load document by filename
            $document = \SetaPDF_Core_Document::loadByFilename('../public/file/draft/'.$surat->nama_file, $writer);

            // create a signer instance for the document
            $signer = new \SetaPDF_Signer($document);

            // add a field with the name "Signature" to the top left of page 1
            $signer->addSignatureField(
                'Signature',                    // Name of the signature field
                1,                              // put appearance on page 1
                \SetaPDF_Signer_SignatureField::POSITION_LEFT_TOP,
                array('x' => 270, 'y' => -520),   // Translate the position (x 50, y -80 -> 50 points right, 80 points down)
                180,                            // Width - 180 points
                70                              // Height - 50 points
            );

            // set some signature properties
            $signer->setReason("SIMSK |");
            $signer->setLocation('Fakultas Teknologi Informasi');
            $signer->setContactInfo('(0751) 9824667');


            // read certificate and private key from the PFX file
            $pkcs12 = array();
            $pfxRead = openssl_pkcs12_read(
                file_get_contents($request->sertifikat), //klu diluar xampp gk kebaca //UBAH ALAMAT
                $pkcs12,
                $request->password
            );

            // error handling
            if (false === $pfxRead) {
                throw new \Exception('The certificate could not be read.');
            }

            // create e.g. a PAdES module instance
            $module = new \SetaPDF_Signer_Signature_Module_Pades();
            // pass the certificate ...
            $module->setCertificate($pkcs12['cert']);
            // ...and private key to the module
            $module->setPrivateKey($pkcs12['pkey']);

            // pass extra certificates if included in the PFX file
            if (isset($pkcs12['extracerts']) && count($pkcs12['extracerts'])) {
                $module->setExtraCertificates($pkcs12['extracerts']);
            }

            // create a Signature appearance
            $visibleAppearance = new \SetaPDF_Signer_Signature_Appearance_Dynamic($module);
            // create a font instance for the signature appearance
            $font = new \SetaPDF_Core_Font_TrueType_Subset(
                $document,
                '../public/file/DejaVuSans.ttf'
            );
            // set the font
            $visibleAppearance->setFont($font);
            // choose a document to get the background from and convert the art box to an xObject
            $backgroundDocument = \SetaPDF_Core_Document::loadByFilename('../public/file/logo_.pdf');
            $backgroundXObject = $backgroundDocument->getCatalog()->getPages()->getPage(1)->toXObject($document);
            // set the background with 50% opacity
            $visibleAppearance->setBackgroundLogo($backgroundXObject, .5);

            // choose a document with a handwritten signature
            $signatureDocument = \SetaPDF_Core_Document::loadByFilename('../public/file/ttd.pdf'); //UBAH ALAMAT
            $signatureXObject = $signatureDocument->getCatalog()->getPages()->getPage(1)->toXObject($document);
            // set the signature xObject as graphic
            $visibleAppearance->setGraphic($signatureXObject);

            // define the appearance
            $signer->setAppearance($visibleAppearance);

            // sign the document
            $signer->sign($module);

            $suratUpdate = SuratKeluar::where('no_regist','=',$id)->update(['nama_file' => 'surat_'.$id.'.pdf' , 'status' => 5]);
        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return redirect('/draft/'.$id.'/getFile')->with('error','Gagal Menandatangani!!');  
        }
        DB::commit();
        return redirect('/draft')->with('info','Draft surat no_regist: '.$id.' telah selesai!');        
    }
}