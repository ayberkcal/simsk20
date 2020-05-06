<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratKeluar;
use App\Models\Layanan;
use App\Models\User;
use App\Models\SyaratLayanan;
use App\Models\Syarat;
use App\Models\Dokumen;
use App\Models\TemplateField;
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
            $status_surat = config('surat_keluar.status_surat');

            return view('admin.permohonan.index',compact('surats','status_surat'));
        }
        elseif($user->hasRole('user')) {
            //ubah jadi order by updated_at
            $surats = SuratKeluar::select('no_regist','kode_layanan','id_user','tgl_permohonan','tujuan','status','updated_at')->where('status','=',2)->orderBy('updated_at','DESC')->get();
            $status_surat = config('surat_keluar.status_surat');

            return view('admin.permohonan.index',compact('surats','status_surat'));
        }

    }

    public function create()    //go to create draft
    {
        $layanan = Layanan::all();
        $pemohon = User::all();
        $dokumen = SyaratLayanan::where('kode_layanan','=','L001')->get(); //ganti $id
        // $dokumen = SyaratLayanan::all();
        $tipe_file = config('surat_keluar.tipe_file');
        $field = TemplateField::where('kode_layanan','=','L001')->get(); //ganti $id
        $tipe_field = config('surat_keluar.tipe_field');
        
        return view('admin.permohonan.create',compact('layanan','pemohon','dokumen','tipe_file','field','tipe_field'));
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
        $data = $request->only('nama_ortu','nik',); //ganti field sesuai permintaan(seharusnya semua data)
        $test['data'] = json_encode($data);
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
                $data[] = $newName;
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
                $dokumen->nama_file = $data[$i];
                $dokumen->save();
            }
        }
      }
      catch(\Exception $e){
        DB::rollBack();
        return redirect('/permohonan')->with('error','Gagal Menambahkan Permohonan Baru!!');  
      }
      DB::commit();
      return redirect('/permohonan')->with('sukses','Permohonan Berhasil Dibuat!');
    }

    //detail permohonan
    public function show($id)
    {
        $surat = SuratKeluar::find($id);
        $status_surat = config('surat_keluar.status_surat');
        $dokumen = Dokumen::where('no_regist',$id)->get();
        return view('admin.permohonan.show',compact('surat','status_surat','dokumen'));
    }

    public function edit($id)   
    {
        $surat = SuratKeluar::find($id);
        $layanan = Layanan::all();
        $pemohon = User::all();
        $syarat = SyaratLayanan::where('kode_layanan',"99")->get();
        $dokumen = Dokumen::where('no_regist',$id)->get();
        $tipe_file = config('surat_keluar.tipe_file');
        return view('admin.permohonan.edit',compact('surat','layanan','pemohon','syarat','dokumen','tipe_file'));
    }

    public function update(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        $surat = SuratKeluar::find($id);
        $request->validate([
            'kode_layanan' => 'required',
            'tgl_permohonan' => 'required',
            'tujuan' => 'required',
        ]);

        $surat->update($request->all());
      }
      catch(\Exception $e){
        DB::rollBack();
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

//belum jelas
    public function layananAjax($id){
        $dokumen = SyaratLayanan::where('kode_layanan',$id)->get();

        return $dokumen;
    }
}