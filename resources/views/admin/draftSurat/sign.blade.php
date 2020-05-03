@extends('dashboard.base')
     
@section('content') 
<div class="col-md-12">
  <div class="nav-tabs-boxed">
    <a class="btn btn-ghost-danger float-right" href="{{ route('draft.index') }}"><i class="cil-action-undo"> Cancel </i></a>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#surat1" role="tab" aria-controls="surat1" aria-selected="true">
              <i class="cil-task"></i> Draft Surat ({{ $surat->no_regist }})
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#surat2" role="tab" aria-controls="surat2" aria-selected="false">
              <i class="cil-description"></i> File Surat</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="surat1" role="tabpanel">
          <div class="container">
            <div class="card card-accent-info" >
              <div class="card-body">
                <table class="table table-responsive-sm table-sm">
                  <tbody>
                    <tr bgcolor="azure">
                        <td><strong>Nomor Surat</strong></td>
                        <td>: {{ $surat->no_surat}}</td>
                    </tr>
                    <tr bgcolor="azure">
                        <td><strong>Tanggal Surat</strong></td>
                        <td>: {{ $surat->tgl_surat}}</td>
                    </tr>
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td width="200px"><strong>No. Regist</strong></td>
                        <td>: {{ $surat->no_regist }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Permohonan</strong></td>
                        <td>: {{ $surat->tgl_permohonan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Layanan</strong></td>
                        <td>: {{ $surat->layanan->nama_layanan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tujuan</strong></td>
                        <td>: {{ $surat->tujuan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Pemohon</strong></td>
                        <td>: {{ $surat->user->nama }}</td>
                    </tr> 
                    <!-- convert json to object php -->
                    <?php $datas=json_decode($surat->data);?> 
                    @foreach($datas as $key=>$value)
                    <tr>
                        <td><strong>
                            <?php 
                            $a=$key; 
                            $b=str_replace("_", " ", $a);
                            $c=str_word_count($b);
                            if ($c==1) {$d=strtoupper($b);} 
                            else {$d=ucwords($b);} 
                            echo $d;?>
                            </strong></td>
                        <td>: {{ $value }}</strong></td>
                    </tr>
                    @endforeach
                    <tr><td></td><td></td></tr>
                    <tr bgcolor="lightblue">
                        <td><strong>Status</strong></td>
                        <td>: <span class="{{ $surat->statuss->class }}">
                              {{ $status_surat[$surat->status] }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>File</strong></td>
                        <td>: <a href="{{url('file/draft/'.$surat->nama_file)}}"><i class="cil-description"></i> {{$surat->nama_file}}</a></td>
                    </tr>                      
                  </tbody>
                </table>
              </div>  
              <div class="card-footer">
                <div class="form-group row" style="padding-left: 15px">
                  <!-- route belum di set -->
                  <button class="sign-modal btn btn-success" type="button" data-toggle="modal" data-target="#sign"><i class="cil-color-border"></i> Sign</button>
                  <form action="#" method="POST">
                    <button class="btn btn-warning" type="submit" style="margin-left: 5px"><i class="cil-eyedropper"></i> Unsign</button>
                  </form>
                  <!--  -->
                  <button class="btn btn-danger active" id="tolakd" title="Tolak Draft" data-toggle="modal" data-target="#tolakD" style="margin-left: 5px"><i class="cil-ban"></i> Tolak</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="surat2" role="tabpanel">
          <div class="container">
            <div class="card uper" >
              <div class="card-header">
                <h4>File draft Surat - <small>No Regist {{$surat->no_regist}}</small></h4>
              </div>
              <div class="card-body">
                <embed width="1000" height="450" src="{{url('file/draft/'.$surat->nama_file)}}" type="application/pdf"></embed>
              </div>
          </div>
        </div>
    </div>
</div>
<div id="sign" class="modal modal-success" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Masukkan Password Sertifikat Elektronik</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{ route('draft.sign',$surat->no_regist) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="form-group row">
                <label class="control-label col-md-3">Password:</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="ket" name="password" autofocus required>
                </div>
              </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal"> Close</button>
              <button class="btn btn-success" type="submit" >
                    <i class="cil-color-border"></i> Sign</button>
              </button>
            </div>
            </form>
          </div>
        </div>
      </div>
</div>
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
  $(document).on('click', '.sign-modal', function() {
        $('.form-horizontal').show();
        $('#sign').modal('show');
    });

  $(document).on('click', '#tolakd', function() {
        $('.form-horizontal').show();
        $('#tolakD').modal('show');
    });
});
</script>
@endsection