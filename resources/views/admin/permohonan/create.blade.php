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
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
        <form method="post" action="{{ route('permohonan.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group row">
                <label class="col-md-2 col-form-label">No Regist *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="no_regist" maxlength="5" required autofocus/><!-- nantik dihidden -->
                </div>
            </div>    
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Layanan *</label>
                <div class="col-md-10">
                    <select class="form-control" name="kode_layanan" onchange="syarat()" id="layanan" required>
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
                <label class="col-md-2 col-form-label">Dokumen Persyaratan *</label>
                <div class="col-md-10" id="d-syarat">
                    <label>-</label>
                </div>
            </div>   
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="icon-cursor"></i> Submit</button>
            <button class="btn btn-sm btn-danger" type="Reset">
                    <i class="cil-ban"></i> Reset</button>
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
       $('#d-syarat').append("<table name='t-syarat' class='table table-responsive-sm table-bordered table-striped table-sm'><thead><tr><th>#</th><th>Syarat</th><th>Dokumen</th></tr></thead> <?php $no = 0; ?> <tbody>@foreach($dokumen as $dokumen)<tr><td>{{++$no}}</td> <td>{{$dokumen->syarat->nama_syarat}}</td><input hidden name='id_syarat[]' value='{{$dokumen->id_syarat}}'><td><input type='file' class='form-control-file' id='nama_file' name='nama_file[]' accept='{{$tipe_file[$dokumen->syarat->tipe_file]}}' required/></td></tr> @endforeach</tbody></table>");    

// ganti empty jadi remove
       $('#field').empty();
       $('#field').append("@foreach($field as $field)<label class='col-md-2 col-form-label'>{{$field->nama_field}} *</label><div class='col-md-10'><input type='{{$tipe_field[$field->tipe_field]}}' class='form-control' name='{{$field->nama_field}}'></div><br><br>@endforeach")
    }
  </script>
@endsection