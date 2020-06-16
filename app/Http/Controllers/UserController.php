<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\DosenTendik;
use Hash;
use File;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $jns_user = config('surat_keluar.jenis_user');

        return view('admin.user.index',compact('user','jns_user'));
    }

    public function create()
    {
        $jekels = config('surat_keluar.jekel');
        $jns_user = config('surat_keluar.jenis_user');

        return view('admin.user.create', compact('jekels','jns_user'));
    }

    public function test()                                                              //HAPUS
    {
        return view('admin.user.test');
    }

    public function store(Request $request)
    {
        $validasi=$request->validate([
            'id_user' => 'required|unique:user',
            'email' => 'required|unique:user'
        ]);

        $max = User::max('foto');
        $noUrut = (int) substr($max, 2, 4) + 1;
        $namaFile = "U" . sprintf("%04s", $noUrut);

        $user = new User();
        $user->id_user = $request->id_user;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jenis_user = $request->jenis_user;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jekel = $request->jekel;
        $user->alamat = $request->alamat;
        $user->hp = $request->hp;
        $user->agama = $request->agama;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = $namaFile."_foto.".$ext;
            $file->move('user/photo',$newName);
            $user->foto = $newName;
        }
        if ($request->hasFile('sertifikat_digital')) {
            $file2 = $request->file('sertifikat_digital');
            $ext2 = $file2->getClientOriginalExtension();
            $newName2 = $namaFile.".".$ext2;
            $file2->move('user/ttd',$newName2);
            $user->sertifikat_digital = $newName2;
        }
        if ($request->hasFile('tanda_tangan')) {
            $file3 = $request->file('tanda_tangan');
            $ext3 = $file3->getClientOriginalExtension();
            $newName3 = $namaFile."_ttd.".$ext3;
            $file3->move('user/ttd',$newName3);
            $user->tanda_tangan = $newName3;
        }
        if ($request->hasFile('paraf')) {
            $file4 = $request->file('paraf');
            $ext4 = $file4->getClientOriginalExtension();
            $newName4 = $namaFile."_paraf.".$ext4;
            $file4->move('user/ttd',$newName4);
            $user->paraf = $newName4;
        }
        $user->save();

        if($request->jenis_user!=1){
            $validasi=$request->validate([
                'jabatan' => 'required',
                'pangkat' => 'required',
                'golongan' => 'required'
            ]);

            $dt = new DosenTendik();
            $dt->id_user = $request->id_user;
            $dt->jabatan = $request->jabatan;
            $dt->sub_bagian = $request->sub_bagian;
            $dt->pangkat = $request->pangkat;
            $dt->golongan = $request->golongan;
            $dt->save();
        }

        return redirect('/pengguna')->with('sukses','Berhasil Menambahkan User '.$request->id_user);
    }

    public function show($id)
    {
        $user = User::find($id);
        $jns_user = config('surat_keluar.jenis_user');
        $jekels = config('surat_keluar.jekel');
        $dt = DosenTendik::find($id);

        return view('admin.user.show', compact('user','jns_user','jekels','dt'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $jns_user = config('surat_keluar.jenis_user');
        $jekels = config('surat_keluar.jekel');
        $dt = DosenTendik::find($id);

        return view('admin.user.edit',compact('user','jns_user','jekels','dt'));
    }

    public function update(Request $request, $id)
    {
        $validasi=$request->validate([
            'id_user' => 'required|unique:user,id_user,'.$id.',id_user',
            'email' => 'required|unique:user,email,'.$id.',id_user',
        ]);

        $user = User::findOrFail($id);
        $noUrut = $user->foto;
        $namaFile = substr($noUrut, 0, 5);
        $user->id_user = $request->id_user;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jenis_user = $request->jenis_user;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jekel = $request->jekel;
        $user->alamat = $request->alamat;
        $user->hp = $request->hp;
        $user->agama = $request->agama;
        if (empty($request->file('foto'))) {
            $user->foto = $user->foto;
        }
        else{
            unlink('user/photo/'.$user->foto); //menghapus file lama  
            $file = $request->file('foto');
            $file->move('user/photo',$user->foto);
            $user->foto = $newName;
        }
        if (empty($request->file('sertifikat_digital'))) {
            $user->sertifikat_digital = $user->sertifikat_digital;
        }
        else{
            if ($user->sertifikat_digital!=NULL) {
                unlink('user/ttd/'.$user->sertifikat_digital); //menghapus file lama
            }
            $file2 = $request->file('sertifikat_digital');
            $ext2 = $file2->getClientOriginalExtension();
            $newName2 = $namaFile.".".$ext2;
            $file2->move('user/ttd',$newName2);
            $user->sertifikat_digital = $newName2;
        }
        if (empty($request->file('tanda_tangan'))) {
            $user->tanda_tangan = $user->tanda_tangan;
        }
        else{
            if ($user->tanda_tangan!=NULL) {
                unlink('user/ttd/'.$user->tanda_tangan); //menghapus file lama
            }
            $file3 = $request->file('tanda_tangan');
            $ext3 = $file3->getClientOriginalExtension();
            $newName3 = $namaFile."_ttd.".$ext3;
            $file3->move('user/ttd',$newName3);
            $user->tanda_tangan = $newName3;
        }
        if (empty($request->file('paraf'))) {
            $user->paraf = $user->paraf;
        }
        else{
            if ($user->foto!=NULL) {
                unlink('user/ttd/'.$user->paraf); //menghapus file lama
            }
            $file4 = $request->file('paraf');
            $ext4 = $file4->getClientOriginalExtension();
            $newName4 = $namaFile."_paraf.".$ext4;
            $file4->move('user/ttd',$newName4);
            $user->paraf = $newName4;
        }
        $user->save();

        if($request->jenis_user!=1){
            $validasi=$request->validate([
                'jabatan' => 'required',
                'pangkat' => 'required',
                'golongan' => 'required'
            ]);

            $dt = DosenTendik::find($id);
            if (DosenTendik::where('id_user',$id)->count()==0) {
                $dt = new DosenTendik();
            }
            $dt->id_user = $request->id_user;
            $dt->jabatan = $request->jabatan;
            $dt->sub_bagian = $request->sub_bagian;
            $dt->pangkat = $request->pangkat;
            $dt->golongan = $request->golongan;
            $dt->save();
        }

        return redirect('/pengguna')->with('sukses','Berhasil Memperbaharui Data.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        File::delete('user/photo/'.$user->foto);
        File::delete('user/ttd/'.$user->sertifikat_digital);
        File::delete('user/ttd/'.$user->tanda_tangan);
        File::delete('user/ttd/'.$user->paraf);
        $user->delete();

        return redirect('/pengguna')->with('sukses','Berhasil Menghapus Data User '.$id);
    }
}
