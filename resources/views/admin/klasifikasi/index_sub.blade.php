@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="right_col">
                    Subklasifikasi <small class="text-muted"> {{$klasifikasi->klasifikasi}} ({{$klasifikasi->kode_klasifikasi}})</small>
                </h4>
            </div><!--col-->
            <div class="col-sm-7">
                <a href="{{route('sub.create',['klasifikasi'=>$klasifikasi->kode_klasifikasi])}}" class="btn btn-success float-right"><i class="icon-plus"></i></a>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr bgcolor="aliceblue">
                            <th>#</th>
                            <th>Kode Sub Klasifikasi</th>
                            <th>Nama Sub Klasifikasi</th>
                            <th>Format Nomor Surat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php
                          $no = 0;
                        ?>
                        <tbody>
                        @foreach($subs as $sub)
                        <tr>
                            <td>{{++$no}}</td>
                            <td>{{$sub->kode_sub}}</td>
                            <td>{{$sub->sub_klasifikasi}}</td>
                            <td>{{$sub->penomoran}}</td>
                            <td>
                              <form action="{{ route('sub.destroy',['klasifikasi'=>$klasifikasi->kode_klasifikasi,'sub'=>$sub->kode_sub]) }}" method="POST">
                                <div class="btn-group"> 
                                  <a class="btn btn-info" href="{{ route('sub.edit',['klasifikasi'=>$klasifikasi->kode_klasifikasi,'sub'=>$sub->kode_sub]) }}"><i class="icon-note"></i></a>
       
                                  @csrf   
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus sub-klasifikasi ini?')"><i class="icon-trash"></i></button>
                                </div>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div><!--row-->
    </div><!--card-body-->
    <div class="card-footer">
        <a class="btn btn-ghost-danger" href="{{ route('klasifikasi.index') }}"><i class="cil-action-undo"> Back </i></a>
        <div class="float-right">{{$subs->links()}}</div>
    </div>
</div><!--card-->

@endsection