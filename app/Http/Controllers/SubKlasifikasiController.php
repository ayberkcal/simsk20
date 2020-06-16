<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subklasifikasi;
use App\Models\Klasifikasi;

class SubKlasifikasiController extends Controller
{
    public function create($id)
    {
        $klas=Klasifikasi::find($id);
        return view('admin.klasifikasi.create_sub',compact('klas'));
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'kode_sub' => 'required|unique:sub_klasifikasi'
        ]);
        SubKlasifikasi::create($request->all());
        return redirect('/klasifikasi-'.$id)->with('sukses','Berhasil Menambahkan Subklasifikasi '.$request->kode_sub);
    }

    public function edit($id,$sub)
    {
        $klas=Klasifikasi::find($id);
        $sub = SubKlasifikasi::find($sub);
        $klasifikasi = Klasifikasi::all();
        return view('admin.klasifikasi.edit_sub',compact('klas','sub','klasifikasi'));
    }

    public function update(Request $request, $id, $sub)
    {
        $request->validate([
            'kode_sub' => 'required|unique:sub_klasifikasi,kode_sub,'.$sub.',kode_sub'
        ]);
        $sub = SubKlasifikasi::find($sub);
        $sub->update($request->all());
        return redirect('/klasifikasi-'.$id)->with('sukses','Berhasil Memperbaharui Data.');
    }

    public function destroy($id,$sub)
    {   
        $sub = SubKlasifikasi::find($sub);
        $sub->delete();
        return redirect('/klasifikasi-'.$id)->with('sukses','Berhasil Menghapus Subklasifikasi '.$sub->kode_sub);
    }
}
