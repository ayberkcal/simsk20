@extends('dashboard.base')

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="right_col">
              Klasifikasi <small class="text-muted">Tambah Data</small>
              <a class="btn btn-ghost-danger float-right" href="{{ route('klasifikasi.index') }}"><i class="cil-action-undo"> Cancel </i></a>
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
            <form action="{{ route('klasifikasi.store') }}" method="post" >
            @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kode Klasifikasi *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_klasifikasi" placeholder="ex: KM" maxlength="2" required autofocus/>
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Klasifikasi *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="klasifikasi" placeholder="ex: Kemahasiswaan" required/>
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