@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="right_col">
                    Surat Keluar <small class="text-muted">Data</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr bgcolor="aliceblue">
                            <th>#</th>
                            <th>No Regist</th>
                            <th>Pemohon</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Layanan</th>
                            <th width="120px">Tujuan</th>
                            <th width="120px">Aksi</th>
                        </tr>
                      </thead>
                      <?php
                        $no = 0;
                      ?>
                      <tbody>
                        @foreach($surat as $surat)
                          <tr>
                            <td>{{++$no}}</td>
                            <td>{{$surat->no_regist}}</td>
                            <td>{{$surat->user->nama}}</td>
                            <td>{{$surat->no_surat}}</td>
                            <td>{{$surat->tgl_surat}}</td>
                            <td>{{$surat->layanan->nama_layanan}}</td>
                            <td>{{$surat->tujuan}}</td>
                            <td>
                                <form action="{{ route('suratkeluar.destroy',$surat->no_regist) }}" method="POST">    
                                  <div class="btn-group"> 
                                    <a class="btn btn-primary" href="{{ route('suratkeluar.show',$surat->no_regist) }}"><i class="icon-eye"></i></a>
                                  </div>
                                  <div class="btn-group"> 
                                    <a class="btn btn-success"><i class="cil-cloud-download"></i></a>
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