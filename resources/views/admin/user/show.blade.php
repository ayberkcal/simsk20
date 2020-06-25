@extends('dashboard.base')

@section('content')
<div class="col-md-12">
  <div class="nav-tabs-boxed">
    <a class="btn btn-ghost-danger float-right" href="{{ route('pengguna.index') }}"><i class="cil-action-undo"> Back </i></a>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#user" role="tab" aria-controls="home" aria-selected="true">
              <i class="cil-list"></i> Data User
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="user" role="tabpanel">    
            <div class="row">
              <div class="col-lg-4">
                <div class="card border-dark">
                  <div class="card-body">
                    <table class="table table-sm table-responsive-sm">
                        <tbody>
                          <tr><center><img src="../user/photo/{{$user->foto}}" width="150px" height="210px"></center></tr><br>
                          <tr>
                            <td width="80px"><strong>Id User</strong></td>
                            <td>: {{ $user->id_user }}</td>
                          </tr>
                          <tr>
                            <td><strong>Nama</strong></td>
                            <td>: {{ $user->nama }}</td>
                          </tr>
                          <tr>
                            <td><strong>Email</strong></td>
                            <td>: {{$user->email}}</td>
                          </tr>
                          <tr>
                            <td><strong>Jenis User</strong></td>
                            <td>: <span class="badge badge-success">{{$jns_user[$user->jenis_user]}}</span></td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    @if($user->jenis_user!=1)
                    <label>PROFIL</label>
                    <table class="table table-responsive-sm table-sm">
                      <tbody>
                        <tr>
                            <td width="200px"><strong>Jabatan</strong></td>
                            <td>: {{ $dt->jabatan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Sub bagian</strong></td>
                            <td>: {{ $dt->sub_bagian }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status Pegawai</strong></td>
                            <td>: {{ $statusp[$dt->status_pegawai] }}</td>
                        </tr>
                        @if($dt->status_pegawai!=2)
                        <tr>
                            <td><strong>Pangkat/ Golongan</strong></td>
                            <td>: {{ $dt->pangkat }}/ {{ $dt->golongan}}</td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                    @endif
                    <label>DATA PRIBADI</label>
                    <table class="table table-responsive-sm table-sm">
                      <tbody>
                        <tr>
                            <td width="200px"><strong>Tempat Lahir</strong></td>
                            <td>: {{ $user->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Lahir</strong></td>
                            <td>: {{ $user->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td>: {{ $jekels[$user->jekel] }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>: {{ $user->alamat }}</td>
                        </tr>
                        <tr>
                            <td><strong>No. Hp</strong></td>
                            <td>: {{ $user->hp }}</td>
                        </tr>
                        <tr>
                            <td><strong>Agama</strong></td>
                            <td>: {{ $user->agama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kelengkapan Data Tanda Tangan Digital</strong></td>
                            <td>
                                <table class="table table-responsive-sm table-bordered table-sm">
                                  <tbody>
                                      <tr>
                                        <td width="150px">Sertifikat Digital</td>
                                        <td>@if($user->sertifikat_digital!=NULL)
                                            <a href="{{url('user/ttd/'.$user->sertifikat_digital)}}">
                                              <i class="cil-description"></i> {{$user->sertifikat_digital}}
                                            </a>@endif
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Tanda Tangan</td>
                                        <td>@if($user->tanda_tangan!=NULL)
                                            <a href="{{url('user/ttd/'.$user->tanda_tangan)}}">
                                              <i class="cil-file"></i> {{$user->tanda_tangan}}
                                            </a>@endif
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Paraf</td>
                                        <td>@if($user->paraf!=NULL)
                                            <a href="{{url('user/ttd/'.$user->paraf)}}">
                                              <i class="cil-file"></i> {{$user->paraf}}
                                            </a>@endif
                                        </td>
                                      </tr>
                                  </tbody>
                                </table> 
                            </td>
                        </tr>                  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection