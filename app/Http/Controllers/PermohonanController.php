<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\Dokumen;
use App\Models\Layanan;
use App\Models\Penandatangan;
use App\Models\Syarat;
use App\Models\SyaratLayanan;
use App\Models\SubKlasifikasi;
use App\Models\SuratKeluar;
use App\Models\TemplateField;
use App\Models\User;
use Dompdf\Dompdf;
use \ConvertApi\ConvertApi;
use TemplateProcessor;
use IOFactory;
use File;


class PermohonanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index() //getList Draft
    {
        $user= Auth()->user();
        if ($user->hasRole('admin')) {
            $surats = SuratKeluar::where('status','<=',2)->orderBy('updated_at','DESC')->get();
            return view('admin.permohonan.index',compact('surats'));
        }
        else{
            $surats = SuratKeluar::where('status','=',2)->orderBy('updated_at','DESC')->get();
            return view('admin.permohonan.index',compact('surats'));
        }
    }

    public function create() //go to create draft
    {
        $layanan = Layanan::all();
        $pemohon = User::all();                                                     //HAPUS, KARNA DI-HIDDEN
        
        $max = SuratKeluar::max('no_regist');
        $noUrut = (int) substr($max, 2, 4) + 1;
        $kode = "S" . sprintf("%04s", $noUrut);

        return view('admin.permohonan.create',compact('layanan','pemohon','kode'));
    }

    public function createAjax($id) //go to create draft
    {
        $layanan = Layanan::all();
        $pemohon = User::all();                                                     //HAPUS, KARNA DI-HIDDEN
        $anggota = User::all();

        $max = SuratKeluar::max('no_regist');
        $noUrut = (int) substr($max, 2, 4) + 1;
        $kode = "S" . sprintf("%04s", $noUrut);

        $dokumen = SyaratLayanan::where('kode_layanan','=',$id)->get();
        $tipe_file = config('surat_keluar.tipe_file');
        $field = TemplateField::where('kode_layanan','=',$id)->get();
        $tipe_field = config('surat_keluar.tipe_field');
        $jSyarat = SyaratLayanan::where('kode_layanan','=',$id)->count();
        
        return view('admin.permohonan.creates',compact('layanan','pemohon','anggota','kode','dokumen','tipe_file','field','tipe_field','jSyarat'))->with('kode_layanan',$id);
    }

    public function store(Request $request) //add draft
    {
      DB::beginTransaction();
      try{
        $test['no_regist'] = $request->no_regist;
        $test['kode_layanan'] = $request->kode_layanan;
        $test['id_user'] = $request->id_user;
        $test['tgl_permohonan'] = $request->tgl_permohonan;
        $test['tujuan'] = $request->tujuan;
        $test['status'] = 1;
        $test['created_at'] = date(now());
        $test['updated_at'] = date(now());
        SuratKeluar::insert($test);

        // pengaturan format nama file dokumen
        if ($request->hasFile('nama_file')) {
            $ids=1;
            foreach ($request->file('nama_file') as $file) {
                $no = $request->no_regist;
                $ext = $file->getClientOriginalExtension();
                $newName = $no."_".$ids.".".$ext;
                $file->move('file/dokumen',$newName);
                $datas[] = $newName;
                ++$ids;
            }
        }

        // store data ke tabel dokumen
        if(($request->nama_file)!=0){
            for ($i=0; $i < count($request->nama_file); $i++) { 
                $dokumen = new Dokumen();
                $dokumen->no_regist = $request->no_regist;
                $dokumen->kode_layanan = $request->kode_layanan;
                $dokumen->id_syarat = $request->id_syarat[$i];
                $dokumen->nama_file = $datas[$i];
                $dokumen->save();
            }
        }

        // store data ke tabel data
        if(($request->data)!=0){
            for ($i=0; $i < count($request->data); $i++) { 
                $field = new Data();
                $field->no_regist = $request->no_regist;
                $field->kode_layanan = $request->kode_layanan;
                $field->id_field = $request->id_field[$i];
                $field->data = $request->data[$i];
                $field->save();
            }
        }
      }
      catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return redirect('/permohonan')->with('error','Gagal Menambahkan Permohonan Baru!!');  
      }
      DB::commit();
      return redirect('/permohonan')->with('sukses','Permohonan dengan Nomor Regist: '.$request->no_regist.' Berhasil Dibuat');
    }

    //detail permohonan
    public function show($id)
    {
        $surat = SuratKeluar::find($id);
        $dokumen = Dokumen::where('no_regist',$id)->get();
        $field = Data::join('template_field','data.id_field','template_field.id_field')
                     ->where('data.no_regist',$id)->get();
        $count = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                            ->where('dokumen.no_regist',$id)
                            ->count();

        return view('admin.permohonan.show',compact('surat','field','dokumen','count'));
    }

    public function edit($id)   
    {
        $surat = SuratKeluar::find($id);
        if($surat['status']==1){
            $dokumen = Dokumen::where('no_regist','=',$id)->get();
            $tipe_file = config('surat_keluar.tipe_file');
            // SELECT template_field.nama_field, data.data FROM data RIGHT JOIN template_field ON template_field.id_field=data.id_field WHERE template_field.kode_layanan='L002'
            //$fields = Data::rightJoin('template_field','data.id_field','template_field.id_field')->where('template_field.kode_layanan',$surat['kode_layanan'])->get();//MASIH MASALAH
            $fields = Data::rightJoin('template_field','data.id_field','template_field.id_field')->where('data.no_regist',$id)->get();                                                     //MASIH BERMASALAH
            $tipe_field = config('surat_keluar.tipe_field');
            $jSyarat = SyaratLayanan::where('kode_layanan','=',$surat['kode_layanan'])->count();
            return view('admin.permohonan.edit',compact('surat','dokumen','tipe_file','fields','tipe_field','jSyarat'));
        }
        else{
            return redirect('/permohonan')->with('error','Permohonan '.$id.' tidak dapat diedit.'); 
        }
    }

    public function update(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        $surat = SuratKeluar::find($id);
        // $request->validate([
        //     'kode_layanan' => 'required',
        //     'tgl_permohonan' => 'required',
        //     'tujuan' => 'required',
        // ]);
        $permohonan= SuratKeluar::where('no_regist','=',$id)->update([ 'kode_layanan' => $request->kode_layanan, 'tujuan' => $request->tujuan, 'updated_at' => date(now())]);

        
        $dokumen = Dokumen::where('no_regist',$id)->get();
        if ($request->nama_file!=NULL) {
            $pjg_array = count($dokumen);
            for ($k=0;$k<$pjg_array;$k++)
            {
                $data="../public/file/dokumen/".$dokumen[$k]['nama_file'];
                File::delete($data);
            }

            $dok = Dokumen::where('no_regist',$id)->delete();
            
            if ($request->hasFile('nama_file')) {
                $ids=1;
                foreach ($request->file('nama_file') as $file) {
                    $no = $request->no_regist;
                    $ext = $file->getClientOriginalExtension();
                    $newName = $no."_".$ids.".".$ext;
                    $file->move('file/dokumen',$newName);
                    $datas[] = $newName;
                    ++$ids;
                }
            }
            if(($request->nama_file)!=0){
                for ($i=0; $i < count($request->nama_file); $i++) { 
                    $dokumen = new Dokumen();
                    $dokumen->no_regist = $request->no_regist;
                    $dokumen->kode_layanan = $request->kode_layanan;
                    $dokumen->id_syarat = $request->id_syarat[$i];
                    $dokumen->nama_file = $datas[$i];
                    $dokumen->save();
                }
            }
        }

        //update tabel data
        $idField = $request->id_field;
        if(($request->data)!=NULL){
            for ($i=0; $i < count($request->data); $i++) { 
                $fields = Data::where('no_regist','=',$id)->where('id_field','=',$idField[$i])->update([ 'data' => $request->data[$i] ]);
            }
        }

      }
      catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return redirect('/permohonan')->with('error','Gagal Memperbaharui Permohonan!!');  
      }
      DB::commit();
      return redirect('/permohonan')->with('sukses','Permohonan berhasil diperbaharui!');
    }

    //batalkan permohonan
    public function destroy($id)
    {
      DB::beginTransaction();
      try{        
        $dokumen = Dokumen::where('no_regist',$id)->get();

        $pjg_array = count($dokumen);
        for ($k=0;$k<$pjg_array;$k++)
        {
            $data="../public/file/dokumen/".$dokumen[$k]['nama_file'];
            File::delete($data);
        }

        $surats=SuratKeluar::where('no_regist',$id)->delete();
      }
      catch(\Exception $e){
        DB::rollBack();
        return redirect('/permohonan')->with('error','Gagal Membatalkan Permohonan!!');  
      }
      DB::commit();
      return redirect('/permohonan')->with('info','Permohonan '.$id.' dibatalkan.');
    }

    //go to halaman proses draft
    public function getDraft($id)
    {
        $surat = SuratKeluar::find($id);
        if(($surat['status']==1)||($surat['status']==2)){
            $dokumen = Dokumen::where('no_regist','=',$id)->get();
            $field = Data::join('template_field','data.id_field','template_field.id_field')
                         ->where('data.no_regist',$id)->get();

            //----------------------------------------------------------------------mulai generate no surat
            $kode=SuratKeluar::join('layanan','surat_keluar.kode_layanan','layanan.kode_layanan')
                             ->join('sub_klasifikasi','layanan.kode_sub','=','sub_klasifikasi.kode_sub')
                             ->where('surat_keluar.no_regist','=',$id)->first();

            $format = SubKlasifikasi::where('kode_sub',$kode['kode_sub'])->first();
            $a = $format['penomoran'];

            //mengambil no urut (no urut ini dimulai dari 1 setiap klasifikasi per tahunnya)
            $nos = SuratKeluar::join('layanan','surat_keluar.kode_layanan','=','layanan.kode_layanan')
                              ->join('sub_klasifikasi','layanan.kode_sub','=','sub_klasifikasi.kode_sub')
                              ->join('klasifikasi','sub_klasifikasi.kode_klasifikasi','=','klasifikasi.kode_klasifikasi')
                              ->where('klasifikasi.kode_klasifikasi',$kode['kode_klasifikasi'])
                              ->where('surat_keluar.status','>',1)
                              ->whereYear('surat_keluar.tgl_permohonan','=',date('Y'))
                              ->count();
            $no = str_replace("[no_urut]", $nos+1, $a);
            //no surat:
            $thn = str_replace("[tahun]", date('Y'), $no);

            //----------------------------------------------------------------------akhir generate no surat

            //hitung jumlah dokumen yang belum diverifikasi
            $verify = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                                 ->where('dokumen.no_regist',$id)
                                 ->where('dokumen.verifikasi',1)
                                 ->count();

            //hitung jumlah dokumen persyaratan
            $count = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                                ->where('dokumen.no_regist',$id)
                                ->count();

            return view('admin.permohonan.prosesDraft',compact('surat','dokumen','field','thn','verify','count'));
        }
        else{
            return view('dashboard.404'); 
        }
    }

    //verifikasi dokumen persyaratan
    public function verifikasiDok(Request $request,$id)
    {
        $dok = Dokumen::where('no_regist','=',$id)->where('kode_layanan','=',$request->kode_layanan)->where('id_syarat','=',$request->id_syarat)->update([ 'verifikasi' => $request->verifikasi]);

        return redirect('permohonan/'.$id.'/getDraft');
    }
    
    //tolak permohonan
    public function tolakPermohonan(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        $surat = SuratKeluar::findOrFail($id);
        $surat->keterangan = $request->keterangan;
        $surat->status = 0; 
        $surat->save($request->all());
      }
      catch(\Exception $e){
        DB::rollBack();
        return redirect('/permohonan')->with('error','Permohonan Gagal Ditolak!!');  
      }
      DB::commit();
      return redirect('/permohonan')->with('info','Permohonan '.$id.' tidak diproses.');
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
        $user = SuratKeluar::join('user','surat_keluar.id_user','=','user.id_user')
                           ->join('dosen_tendik','user.id_user','=','dosen_tendik.id_user')
                           ->where('surat_keluar.no_regist','=',$id)
                           ->get();
        $jns_user = SuratKeluar::join('user','surat_keluar.id_user','=','user.id_user')
                               ->where('surat_keluar.no_regist','=',$id)
                               ->first();
        $dataTambahan = Data::join('template_field','data.id_field','template_field.id_field')
                            ->where('data.no_regist',$id)->get();
        $template = Layanan::where('kode_layanan',$surat['kode_layanan'])->first();

        //------------------------------------------------------------------------------mulai generate surat 
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/file/template/'.$template['template_file']);
        
        //data penandatangan
        foreach ($penandatangan as $k) {    
            $templateProcessor->setValues([
                'penandatangan_nama'=>$k->nama, 
                'penandatangan_id_user'=>$k->id_user,
                'penandatangan_pangkat'=>$k->pangkat,
                'penandatangan_golongan'=>$k->golongan,
                'penandatangan_jabatan'=>$k->jabatan,
            ]);
        }

        //data pemohon yang diambil dari tabel user
        $fieldUser = $surat->user;
        $dataUserE = json_encode($fieldUser);
        $dataUserD = json_decode($dataUserE);
        foreach($dataUserD as $key=>$value){
            $templateProcessor->setValues([
                $key=>$value, 
            ]);
        }

        //data pemohon yang diambil dari tabel dosen_tendik  
        foreach ($user as $u) {
            $templateProcessor->setValues([
                'jabatan'=>$u->jabatan,
                'sub_bagian'=>$u->sub_bagian,
                'status_pegawai'=>$u->status_pegawai,
                'pangkat'=>$u->pangkat,
                'golongan'=>$u->golongan,
            ]);
        }

        //data dari tabel surat
        $templateProcessor->setValues([
            'no_surat' => $request->no_surat,
            'tgl_surat' => date('d F Y'),
            'tujuan' => $surat->tujuan,
        ]);

        //data dari tabel data
        foreach ($dataTambahan as $d) {    
            $templateProcessor->setValues([
                $d->nama_field => $d->data
            ]);
        }

        //set thn akademik dan semester saat ini
        $bulan=date('m');
        if ($bulan<="06") {
            $thn_akademik=(date('Y')-1).'/'.date('Y');
            $semester="Genap";}
        elseif ($bulan<="12") {
            $thn_akademik=date('Y').'/'.(date('Y')+1);
            $semester="Ganjil";}

        //set jurusan
        $nim=$surat->id_user;
        $jurusan=substr($nim, 3, 3);
        if($jurusan=="151"){
            $jurusan="Sistem Komputer";}
        elseif ($jurusan=="152") {
            $jurusan="Sistem Informasi";}
        else{$jurusan="-";}

        //set jenis user
        if($jns_user['jenis_user']==1){$jenis_user="Mahasiswa";}
        elseif($jns_user['jenis_user']==2){$jenis_user="Tenaga Pendidik";}
        elseif($jns_user['jenis_user']==3){$jenis_user="Tenaga Kependidikan";}

        $templateProcessor->setValues([
            'thn_akademik' => $thn_akademik,
            'semester' => $semester,
            'fakultas'=>'Teknologi Infomasi',
            'jurusan' => $jurusan,
            'jenis_user' => $jenis_user,
            'bulan' => $bulan,
            'tahun' => date('Y'),
        ]);
                                                                                            //CONTOH CLONING
        // $values = [
        //     ['userId' => 1, 'userName' => 'Ami', 'userAddress' => '1511521007'],
        //     ['userId' => 2, 'userName' => 'Tenti', 'userAddress' => '1511522007'],
        // ];
        // $templateProcessor->cloneRowAndSetValues('userId',$values);

        //generate to word
        $templateProcessor->saveAs('../public/file/draft/'.$id.'.docx');

        //generate to pdf by convertapi.com
        ConvertApi::setApiSecret('Q1SKMWQh0Ei2Zb68');
        $result = ConvertApi::convert('pdf', ['File' => '../public/file/draft/'.$id.'.docx']);
        $result->getFile()->save('../public/file/draft/'.$id.'.pdf');

        //------------------------------------------------------------------------------akhir generate surat

        $jmlhSigner=SuratKeluar::join("layanan","surat_keluar.kode_layanan","layanan.kode_layanan")
                               ->join("penandatangan","layanan.kode_layanan","penandatangan.kode_layanan")
                               ->where("surat_keluar.no_regist",$id)
                               ->count();
        if ($jmlhSigner==1) {
            $status=4;
        }
        else{
            $status=3;
        }

        $suratUpdate = SuratKeluar::where('no_regist','=',$id)->update(['no_surat' => $request->no_surat, 'tgl_surat' => $request->tgl_surat, 'nama_file' => $id.'.pdf' , 'keterangan' => NULL, 'verifikasi' => $jmlhSigner , 'status' => $status]);
      }
      catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return redirect('/permohonan')->with('error','Permohonan Gagal Diproses!!');  
      }
      DB::commit();
      return redirect('/permohonan')->with('info','Draft surat '.$id.' sedang diproses!');
    }

}