@extends('dashboard.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
            Layanan <small class="text-muted">Tambah Data</small>
            <a class="btn btn-ghost-danger float-right" href="{{ route('layanan.index') }}"><i class="cil-action-undo"> Cancel </i></a>
        </h4>
    </div>
    <div id="alert_size"></div>
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

        <form method="post" action="{{ route('layanan.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kode Layanan *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_layanan" value="{{$kode}}" required readonly/>
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Sub Klasifikasi *</label>
                    <div class="col-md-10">
                        <select class="form-control" name="kode_sub" required autofocus>
                          <option value="" disabled selected>--Pilih--</option>
                        @foreach($sub as $sub)
                          <option value="{{$sub->kode_sub}}">{{$sub->sub_klasifikasi}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Layanan *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nama_layanan" placeholder="ex: Surat Keterangan Aktif Kuliah (Slip Gaji Ortu)" required/>
                    </div>
                </div>   
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Template File *</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" id="template_file" name="template_file" accept=".docx" onchange="ValidateInput(this)" required/>
                        <small id="size"><font color='blue'>(ukuran file maks = 200 KB, ekstensi file = .docx)</font></small>
                    </div>
                </div>   
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Persyaratan</label>
                    <div class="col-md-10">
                        <select name="id_syarat[]" class="form-control" id="syarats" multiple="multiple">
                            @foreach($syarat as $syarat)
                            <option value="{{$syarat->id_syarat}}"> {{$syarat->nama_syarat}}</option>
                            @endforeach
                        </select>
                        <small><font color='blue'> (pilih satu atau lebih syarat jika ada)</font></small>
                    </div>
                </div>   
                <!-- baru bisa untuk 1 penandatangan -->
                <div class="form-group row" style="margin-bottom: 0px">
                    <label class="col-md-2 col-form-label" for="ttd">Penanda Tangan *<br><small><font color="blue">(urutkan penandatangan berdasarkan hierarki)</font></small></label>
                      <div class="form-group row col-md-8">
                        <div class="col-md-6" id="h-ttd">
                          <select class="form-control" name="id_user[]" id="id_user" required>
                            <option value="" disabled selected>--Pilih--</option>
                          @foreach($penandatangan as $penandatangan)
                            <option value="{{$penandatangan->id_user}}">{{$penandatangan->nama}}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="col-md-2 col-form-label" >
                            <label for="status">Status *</label>
                        </div>
                        <div class="col-md-4" id="h-status">
                              <input hidden class="form-control" name="status[]" id="status" required value="1" />
                              <input type="text" class="form-control" value="penandatangan" disabled>
                        </div>
                      </div>
                      <div class="box-footer">
                        <a id="hapus-ttd" class="btn btn-danger"><i class="icon-trash"></i></a>
                        <a id="tambah-ttd" class="btn btn-success"><i class="icon-plus"></i></a>
                      </div>
                </div>     
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" >Data Tambahan<br><small><font color='blue'>  (sesuaikan dengan file template)</font></small></label>
                    <div class="form-group row col-md-10">
                      <div class="col-md-2">
                        <a id="tambah-field" class="btn btn-success"><i class="icon-plus"></i></a>
                        <a id="hapus-field" class="btn btn-danger"><i class="icon-trash"></i></a>
                      </div>
                      <div class="form-group row col-md-8">
                        <div class="col-md-1" id="lf">
                        </div>
                        <div class="col-md-5" id="h-field">
                        </div>
                        <div class="col-md-1" id="lt">
                        </div>
                        <div class="col-md-5" id="h-tipe">
                        </div>
                      </div>
                    </div>
                </div> 
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit">
                        <i class="icon-cursor"></i> Submit</button>
                </div>
        </form>
    </div>
</div>       
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
  <script>
    var fId = 1;
    var pId = 1;
    $(document).ready(function() {
        
        $('#syarats').select2({
            placeholder : '--Pilih Syarat--',
        });

        $('#tambah-ttd').click(function(){
            $('#h-ttd').append("<select name='id_user[]' class='form-control' id='id_user_"+pId+"' required> <option value='' disabled selected>--Pilih--</option>@foreach($penandatangan1 as $ttd)<option value='{{$ttd->id_user}}'> {{$ttd->nama}}</option>@endforeach </select>");

            $('#h-status').append("<input hidden class='form-control' name='status[]' id='ids_"+pId+"' value='2'><input class='form-control' id='status_"+pId+"' value='Pemaraf' disabled required>");
            pId++;
        });

        $('#hapus-ttd').click(function(){
            console.log("ttd");
            let ttd = pId - 1;
      
            $('#label_ttd_'+ttd+'').remove();  
            $('#id_user_'+ttd+'').remove();  
            $('#ids_'+ttd+'').remove();  
            $('#label_status_'+ttd+'').remove();  
            $('#status_'+ttd+'').remove();            
            pId--;           
        });

        $('#tambah-field').click(function(){
            $('#lf').append("<label class='col-form-label' id='lf_"+fId+"'>Kolom*</label>");
            $('#h-field').append("<input type='text' class='form-control' name='nama_field[]' id='field_"+fId+"' placeholder='ex: nama_ortu' required>");

            $('#lt').append("<label class='col-form-label' id='lt_"+fId+"'>Tipe*</label>");
            $('#h-tipe').append("<select class='form-control' onchange='ganti(this)' name='tipe_field[]' id='tipe_"+fId+"' required><option value='' disabled selected>--Pilih--</option>@foreach($tipe_field as $key=>$value)<option value='{{$key}}'>{{$value}}</option> @endforeach</select>");    
            fId++;
        });

        $('#hapus-field').click(function(){
            console.log("f");
            let f = fId - 1;
      
            $('#lf_'+f+'').remove();  
            $('#field_'+f+'').remove();  

            $('#lt_'+f+'').remove();  
            $('#tipe_'+f+'').remove();            
            fId--;           
        });     
    });

    function ValidateInput(file) {
        var FileSize = file.files[0].size / 1024 ; // in KB
        var pathFile = file.value;
        var ekstensiOk = /(\.docx)$/i;
        if (FileSize > 200) {
            //alert('File size exceeds 200 KB');
            $(file).val(''); //for clearing with Jquery
            $('#vsize').remove();
            $('#alert_size').append("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='vsize'><span class='badge badge-pill badge-warning'>Warning</span> Ukuran file maks 200 KB!! <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
        }
        else if(!ekstensiOk.exec(pathFile)){
            //alert('Silakan upload file yang memiliki ekstensi .docx');
            $(file).val('');
            $('#veks').remove();
            $('#alert_size').append("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='veks'><span class='badge badge-pill badge-warning'>Warning</span> Silakan upload file yang memiliki ekstensi .docx!! <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
        }
        else{
            $('#vsize').remove();
            $('#veks').remove();
        }
    }

    function ganti(v) {
        var a = str_replace(" ","_",v.value);
        v.value=a;
    }
  </script>
@endsection