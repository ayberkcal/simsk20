<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Layanan;
use App\Models\Subklasifikasi;
use App\Models\Syarat;
use App\Models\SyaratLayanan;
use App\Models\User;
use App\Models\PenandaTangan;
use App\Models\TemplateField;
use File;

class LayananController extends Controller
{
    public function index()
    {
        $layanan=Layanan::all();
        return view('admin.layanan.index',compact('layanan'));
    }

    public function create()
    {
        $sub=SubKlasifikasi::all();
        $syarat=Syarat::all();
        $penandatangan=User::where('jenis_user','!=',1)->get();
        $penandatangan1=User::where('jenis_user','!=',1)->get();
        $status_ttd = config('surat_keluar.penandatangan');
        $tipe_field = config('surat_keluar.tipe_field');
        $kode = "L".sprintf("%03s", Layanan::count()+1);
        return view('admin.layanan.create',compact('sub','syarat','penandatangan','penandatangan1','status_ttd','tipe_field','kode'));
    }

    public function store(Request $request)
    {
      DB::beginTransaction();
      try{
        //insert ke tabel layanan
        $layanan = new Layanan();
        $layanan->kode_layanan = $request->kode_layanan;
        $layanan->kode_sub = $request->kode_sub;
        $layanan->nama_layanan = $request->nama_layanan;
        if ($request->hasFile('template_file')) {
            $file = $request->file('template_file');
            $ext = $file->getClientOriginalExtension();
            $kode = $request->kode_layanan;
            $newName = $kode.".".$ext;
            $file->move('file/template',$newName);
            $layanan->template_file = $newName;
        }
        $layanan->save();

        //insert ke tabel syarat_layanan
        if(($request->id_syarat)!=NULL){
            for ($i=0; $i < count($request->id_syarat); $i++) { 
                SyaratLayanan::create([
                    'kode_layanan' => $request->kode_layanan,
                    'id_syarat' => $request->id_syarat[$i]
                ]);
            }
        }
        //insert ke tabel penandatangan
        // validasi composite key belum
        if(($request->id_user)!=NULL){
            for ($i=0; $i < count($request->id_user); $i++) { 
                 PenandaTangan::create([
                    'kode_layanan' => $request->kode_layanan,
                    'id_user' => $request->id_user[$i],
                    'status' => $request->status[$i],
                    'urutan' => $i+1
                ]);
            }
        }

        //insert ke tabel template_field
        if(($request->nama_field)!=NULL){
            for ($i=0; $i < count($request->nama_field); $i++) { 
                 TemplateField::create([
                    'kode_layanan' => $request->kode_layanan,
                    'nama_field' => $request->nama_field[$i],
                    'tipe_field' => $request->tipe_field[$i]
                ]);
            }
        }
      }
      catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return redirect('/layanan')->with('error','Gagal Menambahkan Layanan Baru!!');  
      }
      DB::commit();
      return redirect('/layanan')->with('sukses','Berhasil Menambahkan Layanan '.$request->kode_layanan);
    }

    public function show($id)
    {   
        $layanan = Layanan::find($id);
        $syarat = SyaratLayanan::where('kode_layanan','=',$id)->get();
        $penandatangan = PenandaTangan::where('kode_layanan','=',$id)->orderBy('urutan','asc')->get();
        $tipe_file = config('surat_keluar.tipe_file');
        $status_ttd = config('surat_keluar.penandatangan');
        $field = TemplateField::where('kode_layanan',$id)->get();
        $tipe_field = config('surat_keluar.tipe_field');
        return view('admin.layanan.show',compact('layanan','syarat','penandatangan','tipe_file','status_ttd','field','tipe_field'));
    }

    public function edit($id)
    {
        $urutan = [];
        $layanan = Layanan::find($id);
        $sub = Subklasifikasi::all();
        $syarat = Syarat::all();
        
        //$syarat1 = SyaratLayanan::where('kode_layanan','=',$id)->get();
        // $penandatangan=User::where('jenis_user','!=',1)->get();
        $penandatangan=PenandaTangan::where('kode_layanan',$id)->orderBy('urutan','asc')->get();
        //$jmlh=PenandaTangan::where('kode_layanan',$id)->count();
        // foreach ($layanan->penandatangan as $layanansigner) {
        //     $urutan[] = $layanansigner->id_user;
        // }
        $penandatangan1=User::where('jenis_user','!=',1)->get();
        $status_ttd = config('surat_keluar.penandatangan');
        
        $field = TemplateField::where('kode_layanan',$id)->get();
        $tipe_field = config('surat_keluar.tipe_field');

        $idf = TemplateField::orderBy('id_field','desc')->first()['id_field'];

        return view('admin.layanan.edit',compact('urutan','layanan','sub','syarat','syarat1','penandatangan','jmlh','penandatangan1','status_ttd','field','tipe_field','idf'));
    }

    public function update(Request $request, $id)
    {
      DB::beginTransaction();   //ubah agar update bukan delete create semua
      try{
        //update tabel layanan
        $layanan = Layanan::findOrFail($id);
        $layanan->kode_layanan = $request->kode_layanan;
        $layanan->kode_sub = $request->kode_sub;
        $layanan->nama_layanan = $request->nama_layanan;
        if (empty($request->file('template_file'))) {
            $layanan->template_file = $layanan->template_file;
        }
        else{
            unlink('file/template/'.$layanan->template_file); //menghapus file lama
            $file = $request->file('template_file');
            $ext = $file->getClientOriginalExtension();
            $kode = $request->kode_layanan;
            $newName = $kode.".".$ext;
            $file->move('file/template',$newName);
            $layanan->template_file = $newName;
        }
        $layanan->save();

      //update tabel syarat_layanan
        //delete semua syarat_layanan
        $syarat = SyaratLayanan::where('kode_layanan', $id)->delete();
        //insert kembali ke tabel syarat_layanan
        if(($request->id_syarat)!=NULL){
            for ($i=0; $i < count($request->id_syarat); $i++) { 
                SyaratLayanan::create([
                    'kode_layanan' => $request->kode_layanan,
                    'id_syarat' => $request->id_syarat[$i]
                ]);
            }
        }

      //update tabel penandatangan
        //delete semua penandatangan
        $dok = PenandaTangan::where('kode_layanan', $id)->delete();
        //insert kembali ke tabel penandatangan
        // validasi composite key belum
        if(($request->id_user)!=NULL){
            for ($i=0; $i < count($request->id_user); $i++) { 
                 PenandaTangan::create([
                    'kode_layanan' => $request->kode_layanan,
                    'id_user' => $request->id_user[$i],
                    'status' => $request->status[$i],
                    'urutan' => $i+1
                ]);
            }
        }

        //update tabel template_field
        $idfield = $request->id_field;
        if(($request->nama_field)!=NULL){
            for ($i=0; $i < count($request->nama_field); $i++) { 
                $fields = TemplateField::where('id_field',$idfield[$i])->first(); 
                $fields->update([
                    'nama_field' => $request->nama_field[$i],
                    'tipe_field' => $request->tipe_field[$i],
                ]);
            }
        }
        //insert ke tabel template_field
        if(($request->nama_fields)!=NULL){
            for ($i=0; $i < count($request->nama_fields); $i++) { 
                 TemplateField::create([
                    'id_field' => $request->id_fields[$i],
                    'kode_layanan' => $request->kode_layanan,
                    'nama_field' => $request->nama_fields[$i],
                    'tipe_field' => $request->tipe_fields[$i]
                ]);
            }
        }

      }
      catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return redirect('/layanan')->with('error','Gagal Memperbaharui Data Layanan'.$id);  
      }
      DB::commit();
      return redirect('/layanan')->with('sukses','Layanan '.$id.' Berhasil Diperbaharui!!');
    }

    public function destroy($id)
    {
      DB::beginTransaction();
      try{
        $layanan = Layanan::find($id);
        $layanan->delete();

        File::delete('file/template/'.$layanan->template_file);  
      }
      catch(\Exception $e){
        DB::rollBack();
        return redirect('/layanan')->with('error','Gagal Menghapus Data!!');  
      }
      DB::commit();      
      return redirect('/layanan')->with('sukses','Layanan '.$id.' Berhasil Dihapus!!');
    }
}