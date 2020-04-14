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
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="surat1" role="tabpanel">
          <div class="container">
            <div class="card card-accent-primary" >
              <div class="card-body">
                <table class="table table-responsive-sm table-sm">
                  <tbody>
                    <tr>
                        <td width="200px"><strong>No. Regist</strong></td>
                        <td>: {{ $surat->no_regist }}</td>
                    </tr>
                    <tr>
                        <td><strong>Layanan</strong></td>
                        <td>: {{ $surat->layanan->nama_layanan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Pemohon</strong></td>
                        <td>: {{ $surat->user->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tujuan</strong></td>
                        <td>: {{ $surat->tujuan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Permohonan</strong></td>
                        <td>: {{ $surat->tgl_permohonan }}</td>
                    </tr> 
                    <tr>
                        <td><strong>Nomor Surat</strong></td>
                        <td>: {{ $surat->no_surat}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Surat</strong></td>
                        <td>: {{ $surat->tgl_surat}}</td>
                    </tr>
                    <tr bgcolor="lightblue">
                        <td><strong>Status</strong></td>
                        <td>: <strong>{{ $status_surat[$surat->status] }}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>File</strong></td>
                        <td>: <a href="{{url('file/surat/'.$surat->nama_file)}}"><i class="cil-description"></i> {{$surat->nama_file}}</a></td>
                    </tr>    
                    <tr>
                        <td></td>
                        <td>
                          <button class="tolakp-modal btn btn-success" type="button" data-toggle="modal" data-target="#tolakP"><i class="cil-color-border"></i> Sign</button> 
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
<div id="tolakP" class="modal modal-success" role="dialog">
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
</div>
@endsection 

@section('javascript')
<script>
$(document).ready(function() {
  $(document).on('click', '.tolakp-modal', function() {
        $('.form-horizontal').show();
        $('#tolakP').modal('show');
    });
});
</script>
@endsection