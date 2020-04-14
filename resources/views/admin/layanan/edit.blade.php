@extends('dashboard.base')
      
@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="right_col">
              Layanan <small class="text-muted">Edit Data</small>
              <a class="btn btn-ghost-danger float-right" href="{{ route('layanan.index') }}"><i class="cil-action-undo"> Cancel </i></a>
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
            <form action="{{ route('layanan.update',$layanan->kode_layanan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kode Layanan *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_layanan" placeholder="ex: 1" maxlength="4" value="{{ $layanan->kode_layanan }}" required/>
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Sub Klasifikasi *</label>
                    <div class="col-md-10">
                        <select class="form-control" name="kode_sub" required>
                        @foreach($sub as $sub)
                          <option value="{{$sub->kode_sub}}" {{$layanan->kode_sub == $sub->kode_sub ? 'selected' : ''}}>{{$sub->sub_klasifikasi}} ({{$sub->kode_sub}})</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Layanan *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nama_layanan" placeholder="ex: Surat Keterangan Aktif Kuliah (Slip Gaji Orang Tua)" value="{{ $layanan->nama_layanan }}" required/>
                    </div>
                </div>   
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Template File *</label>
                    <div class="col-md-10">
                      <a href="{{url('file/template/'.$layanan->template_file)}}">
                        <i class="fa fa-file-text-o fa-lg"></i> {{$layanan->template_file}}</a><br><br>
                      <input type="file" class="form-control-file" name="template_file" accept=".docx"required />
                    </div>
                </div>   
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Persyaratan</label>
                    <div class="col-md-10">
                      <select name="id_syarat[]" class="form-control" id="syarat4" multiple="multiple">
                        @foreach($syarat as $syarat)
                           <option value="{{$syarat->id_syarat}}" {{$syarat->id_syarat == $layanan->id_syarat ? 'selected' : ''}}>{{$syarat->nama_syarat}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>   
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="ttd">Penanda Tangan *</label>
                    <div class="form-group row col-md-10">
                      <div class="form-group row col-md-9">
                        <div class="col-md-6" id="h-ttd">
                          <select class="form-control" name="id_user[]" id="id_user" required>
                          @foreach($penandatangan as $penandatangan)
                            <option value="{{$penandatangan->id_user}}">{{$penandatangan->nama}}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="col-md-2">
                            <label for="status">Status *</label></div>
                        <div class="col-md-4" id="h-status">
                            <select class="form-control" name="status[]" id="status" required>
                              @foreach($status_ttd as $key=>$value)
                                  <option value="{{$key}}">{{$value}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="box-footer">
                        <a id="hapus-ttd" class="btn btn-danger"><i class="icon-trash"></i></a>
                        <a id="tambah-ttd" class="btn btn-success"><i class="icon-plus"></i></a>
                      </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
  <script>
    var hId = 1;
    var pId = 1;
    $(document).ready(function() {
        $('#syarat4').select2();
        $('#tambah-ttd').click(function(){
            $('#h-ttd').append("<select name='id_user[]' class='form-control' id='id_user_"+pId+"'> @foreach($penandatangan1 as $ttd)<option value='{{$ttd->id_user}}'> {{$ttd->nama}}</option>@endforeach </select>");

            $('#h-status').append("<select class='form-control' name='status[]' id='status_"+pId+"'>@foreach($status_ttd as $key=>$value)<option value='{{$key}}'>{{$value}}</option> @endforeach</select>");
            pId++;
        });

        $('#hapus-ttd').click(function(){
            console.log("ttd");
            let ttd = pId - 1;
      
            $('#label_ttd_'+ttd+'').remove();  
            $('#id_user_'+ttd+'').remove();  

            $('#label_status_'+ttd+'').remove();  
            $('#status_'+ttd+'').remove();            
            pId--;           
        });
    });
  </script>
@endsection