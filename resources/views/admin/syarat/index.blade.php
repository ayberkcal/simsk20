@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="right_col">
                    Data Master <small class="text-muted">Syarat</small>
                </h4>
            </div><!--col-->
            <div class="col-sm-7">
                <a href="{{route('syarat.create')}}" class="btn btn-success float-right"><i class="icon-plus"></i></a>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-sm table-responsive">
                    <table class="table">
                        <thead>
                        <tr bgcolor="aliceblue">
                            <th>#</th>
                            <th>Syarat</th>
                            <th>Tipe File</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php
                          $no = 0;
                        ?>
                        <tbody>
                        @foreach($syarats as $syarat)
                          <tr>
                            <td>{{++$no}}</td>
                            <td>{{$syarat->nama_syarat}}</td>
                            <td>{{$tipe_file[$syarat->tipe_file]}}
                            <td>
                                <form action="{{ route('syarat.destroy',$syarat->id_syarat) }}" method="POST">  
                                  <div class="btn-group">
                                    <a class="btn btn-info" href="{{ route('syarat.edit',$syarat->id_syarat) }}"><i class="icon-note"></i></a>
                                    @csrf   
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus syarat ini?')"><i class="icon-trash"></i></button>
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
        {{$syarats->links()}}
    </div>
</div><!--card-->
@endsection