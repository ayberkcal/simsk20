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
                    <select class="form-control" name="kode_layanan" onchange="goToTestPage(this.value)" required autofocus>
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
    function goToTestPage(id){
        window.location.href = "createAjax/"+id;
    }
</script>
@endsection