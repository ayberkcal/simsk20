@extends('dashboard.base')
     
@section('content') 
<div class="col-md-12">
  <div class="nav-tabs-boxed">
    <a class="btn btn-ghost-danger float-right" href="{{ route('draft.index') }}"><i class="cil-action-undo"> Cancel </i></a>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#surat1" role="tab" aria-controls="surat1" aria-selected="true">
              <i class="cil-list-rich"></i> Detail Draft Surat ({{ $surat->no_regist }})
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
            <div class="card card-accent-success" >
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
                    <?php $datas=json_decode($surat->data);?>
                    @foreach($datas as $key=>$value)
                    <tr>
                        <td><strong>{{$key}}</strong></td>
                        <td>: {{ $value }}</strong></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><strong>Dokumen Persyaratan</strong></td>
                        <td>
                            <table class="table table-responsive-sm table-sm">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Syarat</th>
                                  <th>Dokumen</th>
                                </tr>
                              </thead>
                              <?php $no = 0; ?>
                              <tbody>
                                @foreach($dokumen as $dokumen)
                                  <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$dokumen->syarat->nama_syarat}} ({{$dokumen->verifikasi}})</td>
                                    <td><a href="{{url('file/dokumen/'.$dokumen->nama_file)}}">
                                        <i class="cil-file"></i> {{$dokumen->nama_file}}</a>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table> 
                        </td>
                    </tr>
                    <!-- <form> -->
                    <tr>
                        <td><strong>Nomor Surat</strong></td>
                        <td>: {{ $surat->no_surat }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Surat</strong></td>
                        <td>: {{ $surat->tgl_surat }}</td>
                    </tr>
                    <tr>
                        <td><strong>Keterangan</strong></td>
                        <td>: {{ $surat->keterangan }}</td>
                    </tr>
                    <tr bgcolor="lightsteelblue">
                        <td><strong>Status</strong></td>
                        <td>: <span class="{{ $surat->statuss->class }}">
                              <strong>{{ $status_surat[$surat->status] }}</strong></span>
                        </td>
                    </tr>    
                    <!-- <tr>
                        <td></td>
                        <td>
                          <button class="btn btn-primary" type="submit">
                              <i class="fa fa-dot-circle-o"></i> Proses</button>
                          <button class="btn btn-danger" type="button" onclick="alert('tolak draft karena ...')">
                              <i class="fa fa-ban"></i> Tolak Draft</button>  
                        </td>
                    </tr>
                  </form> -->                    
                  </tbody>
                </table>
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
                <embed width="960" height="450" src="{{url('file/draft/'.$surat->nama_file)}}" type="application/pdf"></embed>
              </div>
              <div class="card-footer">
                <button class="btn btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tolak Draft</button>
                <div class="collapse" id="collapseExample" style="">
                  <div class="card card-body">
                    <form action="{{ route('draft.tolakDraft',$dokumen->no_regist) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <h6>Apabila di dalam draft surat terdapat kekeliruan, maka silahkan ketikkan kesalahan tersebut pada kolom di bawah ini dan klik tombol "Tolak"</h6>
                      <div class="form-group row">
                          <label class="col-md-2"><b>Keterangan *</b></label>
                          <textarea type="text" class="form-control col-md-8" name="keterangan" maxlength="50" required></textarea>
                          <div class="col-md-2">
                              <button class="btn btn-danger" type="submit">
                                  <i class="cil-ban"></i> Tolak</button>
                          </div>
                      </div> 
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
 @endsection 
