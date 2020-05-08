@extends('dashboard.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
          Permohonan Surat <small class="text-muted">Tambah Data</small>
        <a class="btn btn-ghost-danger float-right" href="{{ route('permohonan.index') }}"><i class="cil-action-undo"> Cancel </i></a>
        </h4>
    </div>
    <div id="alert_size"></div>
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
                    <select class="form-control" name="kode_layanan" onchange="syarat()" id="layanan" required autofocus>
                      <option value="" disabled selected>--Pilih--</option>
                    @foreach($layanan as $layanan)
                      <option value="{{$layanan->kode_layanan}}">{{$layanan->nama_layanan}}</option>
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
            <input type="hidden" name="tgl_permohonan" value="{{now()}}"/>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tujuan *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tujuan" required autocomplete="off" />
                </div>
            </div>   
            <input type="hidden" class="form-control" name="status" value="1" />
            <!-- tambah field -->
            <div class="form-group row" id="field">
            </div>  
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Dokumen Persyaratan *<small id="size"><font color="blue"> (ukuran file maks = 2 MB)</font></small></label>
                <div class="col-md-10" id="d-syarat">
                    <label>-</label>
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
    function syarat() {
      /*var x = document.getElementById("layanan").value;*/
      /*document.getElementById("d-syarat").innerHTML = "YOU CHOOSE:" + x;*/
       $('#d-syarat').empty(); 
       $('#d-syarat').append("<table name='t-syarat' class='table table-responsive-sm table-bordered table-striped table-sm'><thead><tr><th>#</th><th>Syarat</th><th>Dokumen</th></tr></thead> <?php $no = 0; ?> <tbody>@foreach($dokumen as $dokumen)<tr><td>{{++$no}}</td> <td>{{$dokumen->syarat->nama_syarat}}<small><font color='blue'> ({{$tipe_file[$dokumen->syarat->tipe_file]}})</font></small></td><input hidden name='id_syarat[]' value='{{$dokumen->id_syarat}}'><td><input type='file' class='form-control-file' id='nama_file' name='nama_file[]' accept='{{$tipe_file[$dokumen->syarat->tipe_file]}}' onchange='ValidateInput(this)' required/></td></tr> @endforeach</tbody></table>");    

// ganti empty jadi remove
       $('#field').empty();
       $('#field').append("@foreach($field as $field)<label class='col-md-2 col-form-label'><?php $a=$field->nama_field; $b=str_replace("_", " ", $a); $c=str_word_count($b); if ($c==1) {$d=strtoupper($b);} else {$d=ucwords($b);} echo $d;?> *</label><div class='col-md-10'><input type='{{$tipe_field[$field->tipe_field]}}' class='form-control' name='{{$field->nama_field}}'></div><br><br>@endforeach")
    }

    function ValidateInput(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        var pathFile = file.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
        // if ({{$dokumen->syarat->tipe_file}}==1) {var ekstensiOk = /(\.pdf)$/i;}
        // else if({{$dokumen->syarat->tipe_file}}==2) {var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;}
        // else {alert('no');}

        if (FileSize > 2) {
            $(file).val(''); //for clearing with Jquery
            $('#vsize').remove();
            $('#alert_size').append("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='vsize'><span class='badge badge-pill badge-warning'>Warning</span> Ukuran file maks 2 MB!! <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
        }
        else if(!ekstensiOk.exec(pathFile)){
            //alert('Silakan upload file yang memiliki ekstensi .docx');
            $(file).val('');
            $('#veks').remove();
            $('#alert_size').append("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='veks'><span class='badge badge-pill badge-warning'>Warning</span> Silakan upload file yang memiliki ekstensi {{$tipe_file[$dokumen->syarat->tipe_file]}}!! <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
        }
        else{
            $('#vsize').remove();
            $('#veks').remove();
        }
    }
  </script>
@endsection