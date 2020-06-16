<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syarat;

class SyaratController extends Controller
{
    public function index()
    {
        $syarats=Syarat::paginate(5);
        $tipe_file = config('surat_keluar.tipe_file');
        return view('admin.syarat.index',compact('syarats','tipe_file'));
    }

    public function create()
    {
        $tipe_file = config('surat_keluar.tipe_file');
        return view('admin.syarat.create',compact('tipe_file'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_syarat' => 'required|unique:syarat'
        ]);
        Syarat::create($request->all());
        return redirect('/syarat')->with('sukses','Berhasil Menambahkan Syarat '.$request->nama_syarat);
    }

    public function edit($id)
    {
        $syarat = Syarat::find($id);
        $tipe_file = config('surat_keluar.tipe_file');
        return view('admin.syarat.edit',compact('syarat','tipe_file'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_syarat' => 'required|unique:syarat,nama_syarat,'.$id.',id_syarat'
        ]);
        $syarat = Syarat::find($id);
        $syarat->update($request->all());
        return redirect('/syarat')->with('sukses','Berhasil Memperbaharui Data.');
    }

    public function destroy($id)
    {
        $syarat = Syarat::find($id);
        $syarat->delete();
        return redirect('/syarat')->with('sukses','Berhasil Menghapus Syarat '.$syarat->nama_syarat);
    }
}