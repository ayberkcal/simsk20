@extends('dashboard.base')

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="right_col">
              Sub-Klasifikasi <small class="text-muted">Tambah Data</small>
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
            <form action="{{ route('sub.store',['klasifikasi'=>$klas->kode_klasifikasi]) }}" method="post" >
            @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kode Sub Klasifikasi *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_sub" maxlength="8" value="{{old('kode_sub')}}" id="input_mask" required/>
                        <small>ex: KM.00.00</small>
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Klasifikasi *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_klasifikasi" value="{{$klas->kode_klasifikasi}}" readonly>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Sub Klasifikasi *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="sub_klasifikasi" value="{{old('sub_klasifikasi')}}" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Format Nomor Surat *</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="penomoran" value="{{old('penomoran')}}" required/>
                        <small>ex: B/[no_urut]/UN.16.15/KM.00.00/[tahun]</small>
                    </div>
                </div>     
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit" id="del">
                        <i class="icon-cursor"></i> Submit</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                        <i class="cil-ban"></i> Reset</button>
                </div>
            </form>
</div>        
@endsection

@section('javascript')
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
document.getElementById("input_mask").addEventListener("focusin", focusIn);
document.getElementById("input_mask").addEventListener("focusout", focusOut);

function focusIn() {
   $('#input_mask').inputmask({
        mask: 'AA.99.99',
        definitions: {
            A: {
                validator: "[A-Za-z]"
            },
        },            
    });
};

function focusOut() {
    var x = document.getElementById("input_mask");
    var a = x.value.substring(5, 8);
    if(a==".__"){
        // x.value=x.value.replace(".__","");
        $('#input_mask').inputmask({
            mask: 'AA.99',
            definitions: {
                A: {
                    validator: "[A-Za-z]"
                },
            },            
        });
    }
    x.value=x.value.toUpperCase();
};    
</script>
@endsection