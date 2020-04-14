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
                            <th width="230px">Aksi(petugas,ttd)</th>
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
                            <td><b>{{$status_surat[$surat->status]}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('draft.showDraft',$surat->no_regist)}}"><i class="icon-eye"></i></a>
                                <a class="btn btn-success" href="{{route('draft.getFile',$surat->no_regist)}}"><i class="cil-color-border"></i> Sign</a>
                                <button class="btn btn-danger" id="tolakd" title="Tolak Draft" data-toggle="modal" data-target="#tolakD"><i class="cil-ban"></i> Tolak</button>
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

<!-- KALAU DATA KOSONG BERMASALAH -->
<div id="tolakD" class="modal modal-danger" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Tolak Draft</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{ route('draft.tolakDraft',$surat->no_regist) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="form-group row">
                <label class="control-label col-md-3" for="no_regist">No Regist:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{$surat->no_regist}}" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Keterangan:</label>
                <div class="col-sm-6">
                  <textarea type="text" class="form-control" id="ket" name="keterangan" maxlength="50" required></textarea>
                </div>
              </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              <button class="btn btn-danger" type="submit" >
                    <i class="cil-ban"></i> Tolak</button>
              </button>
            </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
  $(document).on('click', '#tolakd', function() {
        $('.form-horizontal').show();
        $('#tolakD').modal('show');
    });
});
</script>
@endsection