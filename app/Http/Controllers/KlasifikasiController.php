<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'kode_klasifikasi' => 'required|unique:klasifikasi',
            'klasifikasi' => 'required'
        ]);

        $klasifikasis = Klasifikasi::create($validasi);

        return redirect('/klasifikasi')->with('sukses','Berhasil Menambahkan Klasifikasi '.$request->kode_klasifikasi);
    }

    public function edit(klasifikasi $klasifikasi)
    {
        return view('admin.klasifikasi.edit',compact('klasifikasi'));
    }

    public function update(Request $request, klasifikasi $klasifikasi)
    {
        $request->validate([
            'kode_klasifikasi' => Rule::unique('klasifikasi')->ignore($klasifikasi),
            'klasifikasi' => 'required'
        ]);

        $klasifikasi->update($request->all());
        return redirect('/klasifikasi')->with('sukses','Berhasil Memperbaharui Data.');
    }

    public function destroy($kode_klasifikasi)
    {
        $klasifikasis=Klasifikasi::where('kode_klasifikasi',$kode_klasifikasi)->delete();
        return redirect('/klasifikasi')->with('sukses','Berhasil Menghapus Klasifikasi '.$kode_klasifikasi);
    }

    //show list data sub klasifikasi
    public function getListSub($id){
        $klasifikasi = Klasifikasi::find($id);
        $subs = SubKlasifikasi::where('kode_klasifikasi','=',$id)->paginate(5);
        return view('admin.klasifikasi.index_sub',compact('klasifikasi','subs'));
    }
}
