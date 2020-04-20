@extends('dashboard.base')
     
@section('content') 
<div class="card">
    <div class="card-header">
        <h4 class="right_col">
          Sub-Klasifikasi <small class="text-muted">Edit Data</small>
          <a class="btn btn-ghost-danger float-right" href="{{ route('klasifikasi.sub',['klasifikasi'=>$klas->kode_klasifikasi]) }}"><i class="cil-action-undo"> Cancel </i></a>
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
        <form action="{{ route('sub.update',['klasifikasi'=>$klas->kode_klasifikasi,'sub'=>$sub->kode_sub]) }}" method="POST"> 
        @csrf 
        @method('PUT')
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Kode Sub Klasifikasi *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="kode_sub" placeholder="ex: KM.00.00" value="{{ $sub->kode_sub }}" maxlength="8" required/>
                </div>
            </div>    
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Klasifikasi *</label>
                <div class="col-md-10">
                    <select class="form-control" name="kode_klasifikasi" required>
                    @foreach($klasifikasi as $klasifikasi)
                      <option value="{{$klasifikasi->kode_klasifikasi}}" {{$klasifikasi->kode_klasifikasi == $sub->kode_klasifikasi ? 'selected' : ''}}>{{$klasifikasi->klasifikasi}} ({{$klasifikasi->kode_klasifikasi}})</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Nama Sub Klasifikasi *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="sub_klasifikasi" value="{{ $sub->sub_klasifikasi }}" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Format Nomor Surat *</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="penomoran" placeholder="ex: B/[no_urut]/UN.16.15/KM.00.00/[tahun]" value="{{ $sub->penomoran }}" required/>
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