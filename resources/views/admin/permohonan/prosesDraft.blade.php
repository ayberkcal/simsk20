@extends('dashboard.base')
     
@section('content') 
<div class="col-md-12">
    <a class="btn btn-ghost-danger float-right" href="{{ route('permohonan.index') }}"><i class="cil-action-undo"> Cancel </i></a>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#surat1" role="tab" aria-controls="surat1" aria-selected="true">
              <i class="cil-task"></i> Preview Draft Surat ({{ $surat->no_regist }})
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
                        <td><strong>Dokumen Persyaratan</strong></td>
                        <td>
                            <table class="table table-responsive-sm table-sm">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Syarat</th>
                                  <th>Dokumen</th>
                                  <th>Verifikasi</th>
                                </tr>
                              </thead>
                              <?php $no = 0; ?>
                              <tbody>
                                @foreach($dokumen as $dokumen)
                                <form action="{{ route('draft.verifikasi',$dokumen->no_regist) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$dokumen->syarat->nama_syarat}} ({{$dokumen->verifikasi}})</td>
                                    <td><a href="{{url('file/dokumen/'.$dokumen->nama_file)}}">
                                        <i class="cil-description"></i> {{$dokumen->nama_file}}</a>
                                    </td>
                                    <td> 
                                      <input type="hidden" name="kode_layanan" value="{{$dokumen->kode_layanan}}">
                                      <input type="hidden" name="id_syarat" value="{{$dokumen->id_syarat}}">
                                      @if($dokumen->verifikasi==0)
                                          <input type="hidden" name="verifikasi" value="1">
                                          <button class="btn-sm btn-secondary"><i class="cil-square"> Unverified</i></button>
                                      @else
                                          <input type="hidden" name="verifikasi" value="0">
                                          <button class="btn-sm btn-success"><i class="cil-task"> Verified</i></button>
                                      @endif
                                    </td>
                                  </tr>
                                </form>
                                @endforeach
                              </tbody>
                            </table> 
                        </td>
                    </tr>
                  <form action="{{ route('draft.prosesDraft',$surat->no_regist) }}" method="POST">
                    @csrf
                    @method('PUT')   

                    @if($surat->no_surat==NULL)             
                    <tr bgcolor="#F5FFFA">
                        <td><strong>Nomor Surat</strong></td>
                        <td><input type="text" name="no_surat" class="form-control-sm col-5" value="{{$thn}}">
                    </tr>
                    @else
                    <tr bgcolor="#F5FFFA">
                        <td><strong>Nomor Surat</strong></td>
                        <input type="hidden" name="no_surat" class="form-control-sm col-5" value="{{$surat->no_surat}}">
                        <td>: {{ $surat->no_surat}}</td>
                    </tr>
                    @endif
                    <tr bgcolor="#F5FFFA">
                        <td><strong>Tanggal Surat</strong></td>
                        <td><input type="text" name="tgl_surat" class="form-control-sm col-5" value="{{now()}}" readonly></td>
                    </tr>
                    <tr bgcolor="#F5FFFA">
                        <td><strong>Keterangan</strong></td>
                        <td>: {{ $surat->keterangan }}</td>
                    </tr>
                    <tr bgcolor="lightblue">
                        <td><strong>Status</strong></td>
                        <td>: <strong>{{ $status_surat[$surat->status] }}</strong></td>
                    </tr>    
                    <tr>
                        <td></td>
                        <td>
                          <button class="btn btn-primary" type="submit"><i class="icon-cursor"></i> Proses</button>
                          <button class="tolakp-modal btn btn-danger" type="button" data-toggle="modal" data-target="#tolakP"><i class="cil-ban"></i> Tolak</button> 
                        </td>
                    </tr>
                  </form>                    
                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </div>
    </div>
</div>
<div id="tolakP" class="modal modal-danger" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Tolak Permohonan</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{ route('permohonan.tolakPermohonan',$surat->no_regist) }}" method="POST" enctype="multipart/form-data">
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

@section('js')
<script>
$(document).ready(function() {
  $(document).on('click', '.tolakp-modal', function() {
        $('.form-horizontal').show();
        $('#tolakP').modal('show');
    });
});
</script>
@endsection