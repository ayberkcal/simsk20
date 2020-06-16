@extends('dashboard.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
          Permohonan Surat <small class="text-muted">Tambah Data</small>
        <a class="btn btn-ghost-danger float-right" href="{{ route('permohonan.index') }}"><i class="cil-action-undo"> Cancel </i></a>
        </h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('permohonan.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group row">
                <label class="col-md-2 col-form-label">No Regist *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="no_regist" value="{{$kode}}" required readonly/>
                </div>
            </div>    
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Layanan *</label>
                <div class="col-md-10">
                    <select class="form-control" name="kode_layanan" id="layanan" onchange="goToTestPage(this.value)" required autofocus>
                      <option value="" disabled selected>--Pilih--</option>
                    @foreach($layanan as $layanan)
                      <option value="{{$layanan->kode_layanan}}" {{$layanan->kode_layanan == $kode_layanan ? 'selected' : ''}}>{{$layanan->nama_layanan}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Pemohon *</label>
                <div class="col-md-10">
                    <select class="form-control" name="id_user" required>
                            <option value="" disabled selected>--Pilih--</option>
                        @foreach($pemohon as $pemohon)
                            <option value="{{$pemohon->id_user}}">{{$pemohon->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tujuan *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tujuan" required/>
                </div>
            </div>   
            <input type="hidden" name="tgl_permohonan" value="{{now()}}"/>
            <input type="hidden" class="form-control" name="status" value="1"/>
            <div class="form-group row" id="field">
                @foreach($field as $field)
                <label class="col-md-2 col-form-label"><?php $a=$field->nama_field; $b=str_replace("_", " ", $a); $c=strlen($b); if ($c<=4) {$d=strtoupper($b);} else {$d=ucwords($b);} echo $d;?> *</label>
                                                                                <!-- MASIH BELUM ADA IDE -->
                    @if($field->tipe_field==6)              
                    <div class="col-md-5">
                        <select class="form-control" name="dataTable[]" id="anggota" required>
                            <option value="" disabled selected>--Pilih--</option>
                            @foreach($anggota as $anggota)
                            <option value="{{$anggota->id_user}}">{{$anggota->nama}}</option>
                            @endforeach
                        </select><small>(termasuk Anda!)</small>
                    </div>
                    <div class="box-footer">
                        <a id="hapus-anggota" class="btn btn-danger"><i class="icon-trash"></i></a>
                        <a id="tambah-anggota" class="btn btn-success"><i class="icon-plus"></i></a>
                      </div><br><br>
                    @else
                    <div class="col-md-10">
                        <input hidden name="id_field[]" value="{{$field->id_field}}">
                        <input type="{{$tipe_field[$field->tipe_field]}}" class="form-control" name="data[]" required>
                    </div><br><br>
                    @endif

                @endforeach
            </div>  
            <div id="alert_size"></div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Dokumen Persyaratan *<small id="size"><font color="blue"> (ukuran file maks = 2 MB)</font></small></label>
              <div class="col-md-10" id="d-syarat">
                @if($jSyarat==0)
                <label>-</label>
                @else
                <table name="t-syarat" class="table table-responsive-sm table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Syarat</th>
                      <th>Dokumen</th>
                    </tr>
                  </thead>
                  <?php $no = 0; ?>
                  <tbody>
                    @foreach($dokumen as $dokumen)
                    <tr>
                      <td>{{++$no}}</td>
                      <td>
                        {{$dokumen->syarat->nama_syarat}}<small><font color='blue'> ({{$tipe_file[$dokumen->syarat->tipe_file]}})</font></small>
                      </td>
                      <td>
                        <input hidden name="id_syarat[]" value="{{$dokumen->id_syarat}}">
                        <input type="file" class="form-control-file" id="nama_file" name="nama_file[]" accept="{{$tipe_file[$dokumen->syarat->tipe_file]}}" onchange="ValidateInput(this)" required/>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
                </div>
            </div>   
            <div class="card-footer">
                <button class="btn btn-primary float-right" type="submit">
                    <i class="icon-cursor"></i> Submit</button>
            </div>
        </form>
</div>  
@endsection

@section('javascript')
  <script>
    function goToTestPage(id){
        window.location.href = id;
    }

    function ValidateInput(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        var pathFile = file.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
        if (FileSize > 2) {
            $(file).val(''); //for clearing with Jquery
            $('#vsize').remove();
            $('#alert_size').append("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='vsize'><span class='badge badge-pill badge-warning'>Warning</span> Ukuran file maks 2 MB!! <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
        }
        else if(!ekstensiOk.exec(pathFile)){
            //alert('Silakan upload file yang memiliki ekstensi .docx');
            $(file).val('');
            $('#veks').remove();
            $('#alert_size').append("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='veks'><span class='badge badge-pill badge-warning'>Warning</span> Silakan upload file yang memiliki ekstensi sesuai persyaratan!! <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
        }
        else{
            $('#vsize').remove();
            $('#veks').remove();
        }
    }
  </script>
@endsection