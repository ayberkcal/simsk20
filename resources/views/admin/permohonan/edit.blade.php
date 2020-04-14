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
                    <input type="text" class="form-control" name="no_regist" value="{{ $surat->no_regist }}" maxlength="5" required/>
                </div>
            </div>    
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Layanan *</label>
                <div class="col-md-10">
                    <select class="form-control" name="kode_layanan" onchange="syarat()" id="layanan" required>
                      <option value="" disabled selected>--Pilih--</option>
                    @foreach($layanan as $layanan)
                      <option value="{{$layanan->kode_layanan}}" {{$layanan->kode_layanan == $surat->kode_layanan ? 'selected' : ''}}>{{$layanan->nama_layanan}}</option>
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
                            <option value="{{$pemohon->id_user}}" {{$pemohon->id_user == $surat->id_user ? 'selected' : ''}}>{{$pemohon->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="tgl_permohonan" value="{{now()}}"/>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Tujuan *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tujuan" required autocomplete="off" value="{{$surat->tujuan}}" />
                </div>
            </div>   
            <input type="hidden" class="form-control" name="status" value="1" />
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
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="icon-cursor"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="cil-ban"></i> Reset</button>
            </div>
        </form>
</div>
 @endsection 
