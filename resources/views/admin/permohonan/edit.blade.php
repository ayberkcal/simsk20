@extends('dashboard.base')
     
 @section('content') 
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
          Permohonan <small class="text-muted">Edit</small>
          <a class="btn btn-ghost-danger float-right" href="{{ route('permohonan.index') }}"><i class="cil-action-undo"> Cancel </i></a>
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
        <form action="{{ route('permohonan.update',$surat->no_regist) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label class="col-md-2 col-form-label">No Regist *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="no_regist" value="{{ $surat->no_regist }}"required readonly/>
                </div>
            </div>    
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Layanan *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="kode_layanan" value="{{$surat->layanan->nama_layanan}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tujuan *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tujuan" required autocomplete="off" value="{{$surat->tujuan}}" />
                </div>
            </div>   
            <div class="form-group row" id="field">
                @foreach($fields as $fields)

                <label class='col-md-2 col-form-label'><?php $a=$fields->nama_field; $b=str_replace("_", " ", $a); $c=strlen($b); if ($c<=4) {$d=strtoupper($b);} else {$d=ucwords($b);} echo $d;?> *</label>
                    <div class='col-md-10'>
                        <!-- masih error -->
                        <input type="{{$tipe_field[$fields->tipe_field]}}" class="form-control" name="{{$fields->nama_field}}" value="{{$fields->data}}" required>
                      
                    </div><br><br>
                @endforeach
            </div> 
            @if($jSyarat!=0)
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Dokumen Persyaratan *</label>
                <div class="col-md-10" id="d-syarat">
                    <table name='t-syarat' class='table table-responsive-sm table-bordered table-striped table-sm'>
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
                          <td>{{$dokumen->syarat->nama_syarat}}</td>
                          <input hidden name='id_syarat[]' value='{{$dokumen->id_syarat}}'>
                          <td>
                            <input type='file' class='' id='nama_file' name='nama_file[]' accept='{{$tipe_file[$dokumen->syarat->tipe_file]}}' required/>
                            <a href="{{url('file/dokumen/'.$dokumen->nama_file)}}"><i class="cil-description"></i> {{$dokumen->nama_file}}</a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            @endif 
            <input hidden name="id_user" value="{{$surat->id_user}}">
            <input hidden name="tgl_permohonan" value="{{now()}}"/>
            <input type="hidden" class="form-control" name="status" value="1"/>  
            <div class="card-footer">
                <button class="btn btn-primary float-right" type="submit">
                    <i class="icon-cursor"></i> Submit</button>
            </div>
        </form>
</div>
 @endsection 