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
            <div class="card card-accent-primary" >
              <div class="card-header">
              <li class="list-group-item list-group-item-info"><span class="badge badge-pill badge-info">INFO</span> Verifikasi draft surat!!</li></div>
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
                    @foreach($field as $field)
                    <tr>
                        <td><strong>
                            <?php 
                            $a=$field->nama_field; 
                            $b=str_replace("_", " ", $a);
                            $c=strlen($b);
                            if ($c==1) {$d=strtoupper($b);} 
                            else {$d=ucwords($b);} 
                            echo $d;?>
                            </strong></td>
                        <td>: {{$field->data}}</strong></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><strong>Dokumen Persyaratan</strong></td>
                        @if($count!=0)
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
                                    <td>{{$dokumen->syarat->nama_syarat}}</td>
                                    <td><a href="{{url('file/draft/'.$dokumen->nama_file)}}">
                                        <i class="cil-file"></i> {{$dokumen->nama_file}}</a>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table> 
                        </td>
                        @else
                        <td><label> -</label></td>
                        @endif
                    </tr>
                    <tr>
                        <td><strong>Nomor Surat</strong></td>
                        <td>: {{ $surat->no_surat }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Surat</strong></td>
                        <td>: {{ $surat->tgl_surat }}</td>
                    </tr>
                    <tr bgcolor="lightsteelblue">
                        <td><strong>Status</strong></td>
                        <td>: <span class="{{ $surat->statuss->class }}">
                              {{$surat->statuss->name}}</span>
                        </td>
                    </tr>                      
                  </tbody>
                </table>
              </div>  
              <div class="card-footer">
                <div class="form-group row" style="padding-left: 15px">
                  <!-- route belum di set -->
                  <form action="{{ route('draft.verifikasiDraft',$surat->no_regist) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn-sm btn-success" type="submit"><i class="cil-task"></i> Verifikasi</button>
                  </form>
                  <button style="margin-left: 5px" class="btn-sm btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="cil-ban"></i> Tolak Draft</button>
              </div>
                <div class="collapse" id="collapseExample" style="">
                  <div class="card card-body">
                    <form action="{{ route('draft.tolakDraft',$surat->no_regist) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <h6>Apabila terdapat kekeliruan di dalam draft surat, maka silahkan ketikkan kesalahan tersebut pada kolom di bawah ini dan klik tombol "Tolak"</h6>
                      <div class="form-group row">
                          <label class="col-md-2"><b>Keterangan *</b></label>
                          <textarea type="text" class="form-control col-md-8" name="keterangan" maxlength="50" required></textarea>
                          <div class="col-md-2">
                              <button class="btn-sm btn-danger" type="submit">
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
</div>
 @endsection 
