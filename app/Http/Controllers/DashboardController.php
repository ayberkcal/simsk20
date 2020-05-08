<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function index(){
    	$permohonan = SuratKeluar::count();
    	$surat = SuratKeluar::where('status',5)->count();
    	$proses = SuratKeluar::where('status','>',1)->where('status','<',5)->count();
    	$belum = SuratKeluar::where('status',1)->count();
    	$ditolak = SuratKeluar::where('status',0)->count();
    	$layanan = Layanan::count();

    	return view('admin.dashboard',compact('permohonan','surat','proses','belum','ditolak','layanan'));
    }
}
