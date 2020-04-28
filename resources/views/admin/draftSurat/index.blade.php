@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="right_col">
                    Draft Surat <small class="text-muted">Data</small>
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
                            <th>No Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Pemohon</th>
                            <th>Layanan</th>
                            <th width="100px">Status</th>
                            <th width="200px">Aksi(signer)</th>
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
                            <td>{{$surat->no_surat}}</td>
                            <td>{{$surat->tgl_surat}}</td>
                            <td>{{$surat->user->nama}}</td>
                            <td>{{$surat->layanan->nama_layanan}}</td>
                            <td>
                                <span class="{{ $surat->statuss->class }}">
                                <b>{{$status_surat[$surat->status]}}
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('draft.showDraft',$surat->no_regist)}}"><i class="icon-eye"></i></a>
                                <a class="btn btn-success" href="{{route('draft.getFile',$surat->no_regist)}}"><i class="cil-color-border"></i> Sign</a>
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