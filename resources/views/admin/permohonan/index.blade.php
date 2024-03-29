@extends('dashboard.base')

@section('content')
<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="right_col">
                    Permohonan <small class="text-muted">Data</small>
                </h4>
            </div><!--col-->
            <div class="col-sm-7">
                <a href="{{route('permohonan.create')}}" class="btn btn-success float-right"><i class="icon-plus"></i></a>
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
                            <th>Layanan</th>
                            <th width="100px">Pemohon</th>
                            <th width="140px">Status</th>
                            <th>updated_at</th>
                            <th width="200px">Aksi(sivitas)</th>
                            <th width="100px">Aksi(petugas)</th>
                        </tr>
                        </thead>
                        <?php
                          $no = 0;
                        ?>
                        <tbody>
                        @foreach($surats as $surat)
                          <tr>
                            <td>{{++$no}}</td>
                            <td>{{$surat->no_regist}}</td>
                            <td>{{$surat->layanan->kode_sub}} - {{$surat->layanan->nama_layanan}}</td>
                            <td>{{$surat->user->nama}}</td>
                            <td>
                                <span class="{{ $surat->statuss->class }}">
                                    <!-- <span class="badge badge-pill badge-light"> X </span> -->
                                {{$surat->statuss->name}}
                                </span><br>
                                <small><font color='grey'>{{$surat->keterangan}}</small>
                            </td>
                            <td>{{$surat->updated_at}}</td>
                            <td>
                                <form action="{{ route('permohonan.destroy',$surat->no_regist) }}" method="POST">    
                                  <div class="btn-group">
                                    <a class="btn btn-primary" href="{{route('permohonan.show',$surat->no_regist) }}"><i class="icon-eye"></i></a>
                                    @if($surat->status==1)
                                    <a class="btn btn-info" href="{{ route('permohonan.edit',$surat->no_regist) }}"><i class="icon-note"></i></a>
                                    @else
                                    <button class="btn btn-light" type="button" disabled=""><i class="icon-note"></i></button>
                                    @endif
                                    
                                    @csrf   
                                    @method('DELETE')
                                    @if($surat->status<=1)
                                    <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin membatalkan permohonan ini?')"><i class="icon-trash"><font style="font-family: 'Segoe UI';"> Batalkan</font></i></button>
                                     @else
                                    <button class="btn btn-light" type="button" disabled=""><i class="icon-trash"></i> Batalkan</button>
                                    @endif
                                  </div>
                                </form>
                            </td>
                            <td>
                                @if($surat->status>0)
                                <a class="btn btn-primary active" href="{{route('permohonan.getDraft',$surat->no_regist)}}"><i class="cil-envelope-open"> Proses</i></a>
                                @endif
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