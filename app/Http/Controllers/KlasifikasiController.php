<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use App\Models\SubKlasifikasi;

class KlasifikasiController extends Controller
{    
    public function index()
    {
        $klasifikasis = Klasifikasi::paginate(10);
        return view('admin.klasifikasi.index',compact('klasifikasis'));
    }

    public function create()
    {
        return view('admin.klasifikasi.create');
    }

    public function store(Request $request)
    {
        $validasi=$request->validate([
            'kode_klasifikasi' => 'required',
            'klasifikasi' => 'required'
        ]);

        $klasifikasis = Klasifikasi::create($validasi);

        return redirect('/klasifikasi')->with('sukses','Berhasil Menambahkan Data.');
    }

    public function edit(klasifikasi $klasifikasi)
    {
        return view('admin.klasifikasi.edit',compact('klasifikasi'));
    }

    public function update(Request $request, klasifikasi $klasifikasi)
    {
        $request->validate([
            'kode_klasifikasi' => 'required',
            'klasifikasi' => 'required'
        ]);

        $klasifikasi->update($request->all());
        return redirect('/klasifikasi')->with('sukses','data berhasil diupdate!');
    }

    public function destroy($kode_klasifikasi)
    {
        $klasifikasis=Klasifikasi::where('kode_klasifikasi',$kode_klasifikasi)->delete();
        return redirect('/klasifikasi')->with('sukses','Data berhasil dihapus!');
    }

    //show list data sub klasifikasi
    public function getListSub($id){
        $klasifikasi = Klasifikasi::find($id);
        $subs = SubKlasifikasi::where('kode_klasifikasi','=',$id)->paginate(5);
        return view('admin.klasifikasi.index_sub',compact('klasifikasi','subs'));
    }
}
