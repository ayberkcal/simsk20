@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="right_col">
                        Data Master <small class="text-muted">Layanan</small>
                    </h4>
                </div><!--col-->
                <div class="col-sm-7">
                    <a href="{{route('layanan.create')}}" class="btn btn-success float-right"><i class="icon-plus"></i></a>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr bgcolor="aliceblue">
                                <th>#</th>
                                <th>Kode Layanan</th>
                                <th>Layanan</th>
                                <th>Sub Klasifikasi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php
                              $no = 0;
                            ?>
                            <tbody>
                            @foreach($layanan as $layanan)
                              <tr>
                                <td>{{++$no}}</td>
                                <td>{{$layanan->kode_layanan}}</td>
                                <td>{{$layanan->nama_layanan}}</td>
                                <td>({{$layanan->kode_sub}}) {{$layanan->subklasifikasi->sub_klasifikasi}}</td>
                                <td>
                                    <form action="{{ route('layanan.destroy',$layanan->kode_layanan) }}" method="POST">    
                                      <div class="btn-group"> 
                                        <a class="btn btn-primary" href="{{ route('layanan.show',$layanan->kode_layanan) }}"><i class="icon-eye"></i></a>
                                        <a class="btn btn-info" href="{{ route('layanan.edit',$layanan->kode_layanan) }}"><i class="icon-note"></i></a>
           
                                        @csrf   
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus layanan ini?')"><i class="icon-trash"></i></button>
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
</div><!--card-->
@endsection