@extends('dashboard.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
          User <small class="text-muted">Tambah Data</small>
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
        <form action="{{ route('pengguna.store') }}" method="post" enctype="multipart/form-data">
        @csrf    
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Id User *<br>
                    <small>(NIM/ NIP/ NIU)</small>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="id_user" value="{{old('id_user')}}" autofocus required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Nama *</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nama" value="{{old('nama')}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Email *</label>
                <div class="col-md-5">
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required/>
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
                    <select class="form-control" name="jenis_user" id="jenis_user" required="true">
                            <option value="" disabled selected>--Pilih--</option>
                        @foreach($jns_user as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
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
                    <input type='text' class='form-control' name='jabatan' value="{{old('jabatan')}}"/>
                </div>
                <label class='col-md-2 col-form-label'>Sub bagian</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='sub_bagian' value="{{old('sub_bagian')}}"/>
                </div>
            </div>
            <div class='form-group row' id="pangkat">
                <label class='col-md-2 col-form-label'>Pangkat *</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='pangkat' value="{{old('pangkat')}}"/>
                </div>
                <label class='col-md-2 col-form-label'>Golongan *</label>
                <div class='col-md-4'>
                    <input type='text' class='form-control' name='golongan' value="{{old('golongan')}}"/>
                </div>
            </div>
            <div class="form-group">
                <li class="list-group-item list-group-item-dark"></li>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Jenis Kelamin *</label>
                <div class="col-md-10 col-form-label">
                    @foreach($jekels as $key=>$value)  
                    <div class="form-check form-check-inline">                   
                        <input type="radio" class="form-check-input" name="jekel" value="{{$key}}" id="{{$value}}" required/><label for="{{$value}}">{{$value}}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tempat Lahir *</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{old('tempat_lahir')}}" required/>
                </div>
                <label class="col-md-2 col-form-label">Tanggal Lahir *</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="tgl_lahir" value="{{old('tgl_lahir')}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Alamat *</label>
                <div class="col-md-5">
                    <textarea type="text" class="form-control" name="alamat" required>{{old('alamat')}}</textarea>
                </div>
                <label class="col-md-2 col-form-label">No. Hp *</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="hp" value="{{old('hp')}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Agama *</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="agama" value="{{old('agama')}}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Foto *</label>
                <div class="col-md-5">
                    <input type="file" class="form-control" name="foto" accept="image/*" required/>
                </div>
            </div>
            <div class="form-group">
                <li class="list-group-item list-group-item-dark"></li>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Sertifikat Digital</label>
                <div class="col-md-4">
                    <input type="file" class="form-control" name="sertifikat_digital" value="{{old('sertifikat_digital')}}" accept=".p12"/><small>(ekstensi .p12)</small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tanda Tangan</label>
                <div class="col-md-4">
                    <input type="file" class="form-control" name="tanda_tangan" accept=".pdf"/><small>(ekstensi .pdf)</small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Paraf</label>
                <div class="col-md-4">
                    <input type="file" class="form-control" name="paraf" accept=".pdf"/><small>(ekstensi .pdf)</small>
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
</div>         
@endsection

@section('javascript')
<script>
    $(document).ready(function(){     
      $("select[id=jenis_user]").on("change", function() { 
        if (($(this).val() == 2)||($(this).val() == 3)) {
          $("div[id=dt]").show();
          $("div[id=jabatan]").show();
          $("div[id=pangkat]").show(); 
        } else { 
          $("div[id=dt]").hide();
          $("div[id=jabatan]").hide();
          $("div[id=pangkat]").hide();
        } 
      }); 
      $("select[id=jenis_user]").trigger("change");
    });
</script>
@endsection