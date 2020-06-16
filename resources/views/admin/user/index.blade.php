@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="right_col">
                        Manajemen User
                    </h4>
                </div><!--col-->
                <div class="col-sm-7">
                    <a href="{{route('pengguna.create')}}" class="btn btn-success float-right"><i class="icon-plus"></i></a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="table table-responsive-sm table-bordered table-sm">
                        <table class="table">
                            <thead>
                            <tr bgcolor="aliceblue">
                                <th>#</th>
                                <th>Id User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis User</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php
                              $no = 0;
                            ?>
                            <tbody>
                            @foreach($user as $user)
                              <tr>
                                <td>{{++$no}}</td>
                                <td>{{$user->id_user}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->email}}</td>
                                <td><span class="badge badge-success">{{$jns_user[$user->jenis_user]}}</span></td>
                                <td>
                                    <form action="{{ route('pengguna.destroy',$user->id_user) }}" method="POST">    
                                      <div class="btn-group"> 
                                        <a class="btn btn-primary" href="{{ route('pengguna.show',$user->id_user) }}"><i class="icon-eye"></i></a>
                                        <a class="btn btn-info" href="{{ route('pengguna.edit',$user->id_user) }}"><i class="icon-note"></i></a>
           
                                        @csrf   
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus user {{$user->id_user}}?')"><i class="icon-trash"></i></button>
                                      </div>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection