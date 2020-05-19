@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="right_col">
                        Data Master <small class="text-muted">Klasifikasi</small>
                    </h4>
                </div><!--col-->
                <div class="col-sm-7">
                    <a href="{{route('klasifikasi.create')}}" class="btn btn-success float-right"><i class="icon-plus"></i></a>
                </div><!--col-->
            </div><!--row-->
            
            <div class="row mt-4">
                <div class="col">
                    <div class="table-sm table-responsive">
                        <table class="table">
                            <thead>
                            <tr bgcolor="aliceblue">
                                <th>#</th>
                                <th>Kode Klasifikasi</th>
                                <th>Klasifikasi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php
                              $no = 0;
                            ?>
                            <tbody>
                            @foreach($klasifikasis as $klasifikasi)
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$klasifikasi->kode_klasifikasi}}</td>
                                <td>{{$klasifikasi->klasifikasi}}</td>
                                <td>
                                    <form action="{{ route('klasifikasi.destroy',$klasifikasi->kode_klasifikasi) }}" method="POST">   
                                      <div class="btn-group"> 
                                        <a class="btn btn-info" href="{{ route('klasifikasi.edit',$klasifikasi->kode_klasifikasi) }}"><i class="icon-note"></i></a>
           
                                        @csrf   
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus klasifikasi ini?')"><i class="icon-trash"></i></button>

                                        <div class="btn-group btn-group show" role="group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</button>
                                            <div class="dropdown-menu" aria-labelledby="userActions" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-91px, 35px, 0px);">             
                                                <a href="{{route('klasifikasi.sub',$klasifikasi->kode_klasifikasi)}}" class="dropdown-item">Subklasifikasi</a>
                                            </div>
                                        </div> 
                                      </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
        <div class="card-footer">
            {{$klasifikasis->links()}}
        </div>
</div><!--card-->
@endsection