<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Dokumen;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat = SuratKeluar::where('status','=',5)->orderBy('tgl_surat','desc')->get();

        return view('admin.surat_keluar.index',compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = SuratKeluar::find($id);
        $dokumen = Dokumen::where('no_regist','=',$id)->get();
        $field = Data::join('template_field','data.id_field','template_field.id_field')
                     ->where('data.no_regist',$id)->get();
        $count = SuratKeluar::join('dokumen','surat_keluar.no_regist','dokumen.no_regist')
                            ->where('dokumen.no_regist',$id)
                            ->count();
       
        return view('admin.surat_keluar.showSurat',compact('surat','dokumen','field','count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
