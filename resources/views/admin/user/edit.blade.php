@extends('dashboard.base')
     
@section('content') 
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
          User <small class="text-muted">Edit Data</small>
          <a class="btn btn-ghost-danger float-right" href="{{ route('pengguna.index') }}"><i class="cil-action-undo"> Cancel </i></a>
        </h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ route('pengguna.update',$user->id_user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Id User *<br>
                    <small>(NIM/ NIP/ NIU)</small>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="id_user" value="{{$user->id_user}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Nama *</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nama" value="{{$user->nama}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Email *</label>
                <div class="col-md-5">
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Password *</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" name="password" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Jenis User *</label>
                <div class="col-md-5">
                    <select class="form-control" name="jenis_user" id="jenis_user" required>
                            <option value="" disabled selected>--Pilih--</option>
                        @foreach($jns_user as $key=>$value)
                            <option value="{{$key}}" {{$user->jenis_user == $key ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
         
            <div class="form-group" id="dt">                                
                <li class="list-group-item list-group-item-dark"></li>
            </div>
            <div class='form-group row' id="jabatan">
                <label class='col-md-2 col-form-label'>Jabatan *</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='jabatan' value="<?php if($user->jenis_user!=1) echo $dt->jabatan; ?>"/>
                </div>
                <label class='col-md-2 col-form-label'>Sub bagian</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='sub_bagian' value="<?php if($user->jenis_user!=1) echo $dt->sub_bagian; ?>"/>
                </div>
            </div>
            <div class='form-group row' id="statusp">
                <label class='col-md-2 col-form-label'>Status Pegawai *</label>
                <div class='col-md-4'>
                    <select class="form-control" name="status_pegawai" id="statusp">
                            <option value="" disabled selected>--Pilih--</option>
                        @foreach($statusp as $key=>$value)
                            <option value="{{$key}}" <?php if($user->jenis_user!=1) echo $dt->status_pegawai == $key ? 'selected' : '' ?>>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class='form-group row' id="pangkat">
                <label class='col-md-2 col-form-label'>Pangkat *</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='pangkat' value="<?php if($user->jenis_user!=1) echo $dt->pangkat; ?>"/>
                </div>
                <label class='col-md-2 col-form-label'>Golongan *</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='golongan' value="<?php if($user->jenis_user!=1) echo $dt->golongan; ?>"/>
                </div>
            </div>
       
            <div class="form-group">
                <li class="list-group-item list-group-item-dark"></li>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Jenis Kelamin *</label>
                <div class="col-md-10 col-form-label">
                    <div class="form-check form-check-inline">                   
                        <input type="radio" class="form-check-input" name="jekel" value="0" id="0" <?php if ($user->jekel==0) echo 'checked'?> required/><label for="0">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline"> 
                        <input type="radio" class="form-check-input" name="jekel" value="1" id="1"<?php if ($user->jekel==1) echo 'checked'?> required/><label for="1">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tempat Lahir *</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{$user->tempat_lahir}}" required/>
                </div>
                <label class="col-md-2 col-form-label">Tanggal Lahir *</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="tgl_lahir" value="{{$user->tgl_lahir}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Alamat *</label>
                <div class="col-md-5">
                    <textarea type="text" class="form-control" name="alamat" required>{{$user->alamat}}</textarea>
                </div>
                <label class="col-md-2 col-form-label">No. Hp *</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="hp" value="{{$user->hp}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Agama *</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="agama" value="{{$user->agama}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Foto *</label>
                <div class="col-md-5">
                    <a href="{{url('user/photo/'.$user->foto)}}">
                        <i class="cil-description"></i> {{$user->foto}}</a>
                    <input type="file" class="form-control" name="foto" accept="image/*" value="{{$user->foto}}"/>
                </div>
            </div>
            <div class="form-group">
                <li class="list-group-item list-group-item-dark"></li>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Sertifikat Digital</label>
                <div class="col-md-4">
                    @if($user->sertifikat_digital!=NULL)
                    <a href="{{url('user/photo/'.$user->sertifikat_digital)}}">
                        <i class="cil-description"></i> {{$user->sertifikat_digital}}</a>
                    @endif
                    <input type="file" class="form-control" name="sertifikat_digital" value="{{$user->sertifikat_digital}}" accept=".p12"/><small>(ekstensi .p12)</small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tanda Tangan</label>
                <div class="col-md-4">
                    @if($user->tanda_tangan!=NULL)
                    <a href="{{url('user/photo/'.$user->tanda_tangan)}}">
                        <i class="cil-description"></i> {{$user->tanda_tangan}}</a>
                    @endif
                    <input type="file" class="form-control" name="tanda_tangan" value="{{$user->tanda_tangan}}" accept=".pdf"/><small>(ekstensi .pdf)</small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Paraf</label>
                <div class="col-md-4">
                    @if($user->paraf!=NULL)
                    <a href="{{url('user/photo/'.$user->paraf)}}">
                        <i class="cil-description"></i> {{$user->paraf}}</a>
                    @endif
                    <input type="file" class="form-control" name="paraf" value="{{$user->paraf}}" accept="image/*"/><small>(ekstensi .png)</small>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="icon-cursor"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="cil-ban"></i> Reset</button>
            </div>
        </form>
</div>
@endsection 

@section('javascript')
<script>
    $(document).ready(function(){     
      $("select[id=jenis_user]").on("change", function() { 
        if (($(this).val() == 2)||($(this).val() == 3)) {
          $("div[id=dt]").show();
          $("div[id=jabatan]").show();
          $("div[id=statusp]").show(); 
        } else { 
          $("div[id=dt]").hide();
          $("div[id=jabatan]").hide();
          $("div[id=statusp]").hide();
          $("div[id=pangkat]").hide();
        } 
      }); 
      $("select[id=jenis_user]").trigger("change");

      $("select[id=statusp]").on("change", function() { 
        if (($(this).val() == 0)||($(this).val() == 1)) {
          $("div[id=pangkat]").show(); 
        } else { 
          $("div[id=pangkat]").hide();
        } 
      }); 
      $("select[id=statusp]").trigger("change");
    });
</script>
@endsection