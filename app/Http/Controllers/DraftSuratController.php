<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokumen;
use App\Models\SuratKeluar;
use App\Models\SubKlasifikasi;
use App\Models\TemplateField;
use App\Models\Penandatangan;
use TemplateProcessor;
use IOFactory;
use setasign;
use Dompdf\Dompdf;


require_once('..\vendor\setasign\setapdf-signer_eval_ioncube_php7.1\library\SetaPDF\Autoload.php');

class DraftSuratController extends Controller
{
    public function index()
    {
        $surat = SuratKeluar::where('status',3)->orWhere('status',4)->orderBy('updated_at','DESC')->get();
        $status_surat = config('surat_keluar.status_surat');
        return view('admin.draftSurat.index',compact('surat','status_surat'));
    }

    //go to halaman proses draft
    public function getDraft($id)
    {
        $surat = SuratKeluar::find($id);
        $status_surat = config('surat_keluar.status_surat');
        $dokumen = Dokumen::where('no_regist','=',$id)->get();

        $format = SubKlasifikasi::where('kode_sub',"KM.00.01")->first();
        $a = $format['penomoran'];

        //mengambil no urut (no urut ini dimulai dari 1 setiap klasifikasi per tahunnya)
        $nos = SuratKeluar::join('layanan','surat_keluar.kode_layanan','=','layanan.kode_layanan')
                          ->join('sub_klasifikasi','layanan.kode_sub','=','sub_klasifikasi.kode_sub')
                          ->join('klasifikasi','sub_klasifikasi.kode_klasifikasi','=','klasifikasi.kode_klasifikasi')
                          ->where('klasifikasi.kode_klasifikasi',"KM")//ganti $kode_klasifikasi
                          ->where('surat_keluar.status','>',1)
                          ->whereYear('surat_keluar.tgl_permohonan','=',date('Y'))
                          ->count();

        $no = str_replace("[no_urut]", $nos+1, $a);

        $thn = str_replace("[tahun]", date('Y'), $no);

        $verify = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                             ->where('dokumen.no_regist',$id)
                             ->where('dokumen.verifikasi',1)
                             ->count();

        $count = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                             ->where('dokumen.no_regist',$id)
                             ->count();

        return view('admin.permohonan.prosesDraft',compact('surat','status_surat','dokumen','thn','verify','count'));
    }

    //proses draft
    public function prosesDraft(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        $surat = SuratKeluar::find($id);
        $penandatangan = SuratKeluar::select('user.*','dosen_tendik.*')
                                      ->join('layanan','surat_keluar.kode_layanan','=','layanan.kode_layanan')
                                      ->join('penandatangan','layanan.kode_layanan','=','penandatangan.kode_layanan')
                                      ->join('user','penandatangan.id_user','=','user.id_user')
                                      ->join('dosen_tendik','user.id_user','=','dosen_tendik.id_user')
                                      ->where('surat_keluar.no_regist','=',$id)
                                      ->where('penandatangan.status','=','1')
                                      ->get();
        $user =SuratKeluar::select('user.*','dosen_tendik.*')
                                      ->join('user','surat_keluar.id_user','=','user.id_user')
                                      ->join('dosen_tendik','user.id_user','=','dosen_tendik.id_user')
                                      ->where('surat_keluar.no_regist','=',$id)
                                      ->get();

//kodingan generate surat disini
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/file/template/template.docx');
        
        foreach ($penandatangan as $k) {    
            $templateProcessor->setValues([
                'penandatangan_nama'=>$k->nama, 
                'penandatangan_id_user'=>$k->id_user,
                'penandatangan_pangkat'=>$k->pangkat,
                'penandatangan_golongan'=>$k->golongan,
                'penandatangan_jabatan'=>$k->jabatan,
                'fakultas'=>'Teknologi Infomasi',
            ]);
        }

        $fieldUser = $surat->user->only('id_user','nama'); //ganti field sesuai permintaan
        $dataUserE = json_encode($fieldUser);
        $dataUserD = json_decode($dataUserE);
        foreach($dataUserD as $key=>$value){
            $templateProcessor->setValues([
                $key=>$value, 
            ]);
        }
                
        foreach ($user as $u) {
            $templateProcessor->setValues([
                'pangkat'=>$u->pangkat,
                'golongan'=>$u->golongan,
                'jabatan'=>$u->jabatan,
                'sub_bagian'=>$u->sub_bagian,
            ]);
        }

        $templateProcessor->setValues([
            'no_surat' => $request->no_surat,
            'tgl_surat' => now(),
            'tujuan' => $surat->tujuan,
        ]);
        
        $datas = json_decode($surat->data);
        foreach($datas as $key=>$value){
            $templateProcessor->setValues([
                $key=>$value, 
            ]);
        }

        $bln=date('m');
        if ($bln<="06") {
            $thn_akademik=(date('Y')-1).'/'.date('Y');}
        elseif ($bln<="12") {
            $thn_akademik=date('Y').'/'.(date('Y')+1);}

        $nim=$surat->id_user;
        $jurusan=substr($nim, 3, 3);
        if($jurusan=="151"){
            $jurusan="Sistem Komputer";}
        elseif ($jurusan=="152") {
            $jurusan="Sistem Informasi";}
        else{$jurusan="-";}

        $templateProcessor->setValues([
            'thn_akademik' => $thn_akademik,
            'jurusan' => $jurusan,
        ]);

        //header("Content-Disposition: attachment; filename=template.docx");

//generate to pdf
        $templateProcessor->saveAs('../public/file/draft/'.$id.'.docx');
        // $temp = $templateProcessor->saveAs('../public/file/draft/'.$id.'.docx');
        // $pdf = $templateProcessor->saveAs('../public/file/draft/'.$id.'.pdf');
        // $phpWord = \PhpOffice\PhpWord\IOFactory::load($temp);
        // $phpWord->saveAs($pdf, 'PDF');
        // $unlink($temp);

  
          // \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path() .'/vendor/dompdf/dompdf');

          //  \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

          //   $phpWord = \PhpOffice\PhpWord\IOFactory::load('../public/file/draft/'.$id.'.docx', 'Word2007');

          //   $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, 'PDF' );

          //   $pdfWriter->save('../public/file/draft/'.$id.'.pdf');
            /////////////

        // $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // //Open template and save it as docx
        // $document = $phpWord->loadTemplate('../public/file/draft/'.$id.'.docx');
        // $document->saveAs('temp.docx');

        // //Load temp file
        // $phpWord = \PhpOffice\PhpWord\IOFactory::load('../public/file/draft/'.$id.'.docx','Word2007'); 

        // //Save it
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
        // $xmlWriter->save('../public/file/draft/'.$id.'.pdf');         


        $suratUpdate = SuratKeluar::where('no_regist','=',$id)->update(['no_surat' => $request->no_surat, 'tgl_surat' => $request->tgl_surat, 'nama_file' => $id.'.pdf' , 'keterangan' => NULL, 'status' => 3]);
      }
      catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return redirect('/permohonan')->with('error','Permohonan Gagal Diproses!!');  
      }
      DB::commit();
      return redirect('/draft')->with('info','Draft surat '.$id.' sedang diproses!');
    }

    //detail draft
    public function showDraft($id)
    {
        $surat = SuratKeluar::find($id);
        $status_surat = config('surat_keluar.status_surat');
        $dokumen = Dokumen::where('no_regist','=',$id)->get();
        return view('admin.draftSurat.show',compact('surat','status_surat','dokumen'));
    }

    //tolak draft
    public function tolakDraft(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        $surat = SuratKeluar::findOrFail($id);
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

    //verifikasi dokumen persyaratan
    public function verifikasi(Request $request,$id)
    {
        $dok = Dokumen::where('no_regist','=',$id)->where('kode_layanan','=',$request->kode_layanan)->where('id_syarat','=',$request->id_syarat)->update([ 'verifikasi' => $request->verifikasi]);

        return redirect('permohonan/'.$id.'/getDraft');
    }

//penandatanganan
    public function getFile($id)
    {
        $surat = SuratKeluar::find($id);
        $status_surat = config('surat_keluar.status_surat');
        $dokumen = Dokumen::where('no_regist','=',$id)->get();
        return view('admin.draftSurat.sign',compact('surat','status_surat','dokumen','thn'));
    }

    public function sign(Request $request, $id)
    {
            require_once('..\vendor\setasign\setapdf-signer_eval_ioncube_php7.1\library\SetaPDF\Autoload.php');  
            $surat = App\Models\SuratKeluar::find($id);

            // create a Http writer (file name)
            $writer = new SetaPDF_Core_Writer_Http('../nama_file.pdf', true);
            // load document by filename
            $document = SetaPDF_Core_Document::loadByFilename('../public/file/'.$surat->nama_file, $writer);

            // create a signer instance for the document
            $signer = new SetaPDF_Signer($document);

            // add a field with the name "Signature" to the top left of page 1
            $signer->addSignatureField(
                'Signature',                    // Name of the signature field
                1,                              // put appearance on page 1
                SetaPDF_Signer_SignatureField::POSITION_LEFT_TOP,
                array('x' => 270, 'y' => -520),   // Translate the position (x 50, y -80 -> 50 points right, 80 points down)
                180,                            // Width - 180 points
                70                              // Height - 50 points
            );

            // set some signature properties
            $signer->setReason("Just for testing");
            $signer->setLocation('setasign.com');
            //$signer->setContactInfo('+49 5351 3803603');


            // read certificate and private key from the PFX file
            $pkcs12 = array();
            $pfxRead = openssl_pkcs12_read(
                file_get_contents('../public/file/aura24011998@gmail.com.p12'),
                $pkcs12,
                $request->password
            );

            // error handling
            if (false === $pfxRead) {
                throw new Exception('The certificate could not be read.');
            }

            // create e.g. a PAdES module instance
            $module = new SetaPDF_Signer_Signature_Module_Pades();
            // pass the certificate ...
            $module->setCertificate($pkcs12['cert']);
            // ...and private key to the module
            $module->setPrivateKey($pkcs12['pkey']);

            // pass extra certificates if included in the PFX file
            if (isset($pkcs12['extracerts']) && count($pkcs12['extracerts'])) {
                $module->setExtraCertificates($pkcs12['extracerts']);
            }

            // create a Signature appearance
            $visibleAppearance = new SetaPDF_Signer_Signature_Appearance_Dynamic($module);
            // create a font instance for the signature appearance
            $font = new SetaPDF_Core_Font_TrueType_Subset(
                $document,
                '../public/file/DejaVuSans.ttf'
            );
            // set the font
            $visibleAppearance->setFont($font);
            // choose a document to get the background from and convert the art box to an xObject
            $backgroundDocument = SetaPDF_Core_Document::loadByFilename('../public/file/logo.pdf');
            $backgroundXObject = $backgroundDocument->getCatalog()->getPages()->getPage(1)->toXObject($document);
            // set the background with 50% opacity
            $visibleAppearance->setBackgroundLogo($backgroundXObject, .5);

            // choose a document with a handwritten signature
            $signatureDocument = SetaPDF_Core_Document::loadByFilename('../public/file/ttd.pdf');
            $signatureXObject = $signatureDocument->getCatalog()->getPages()->getPage(1)->toXObject($document);
            // set the signature xObject as graphic
            $visibleAppearance->setGraphic($signatureXObject);

            // define the appearance
            $signer->setAppearance($visibleAppearance);

            // sign the document
            $signer->sign($module);

             $suratUpdate = App\Models\SuratKeluar::where('no_regist','=',$id)->update(['nama_file' => 'surat_'.$id.'.pdf' , 'status' => 5]);
    }
}
