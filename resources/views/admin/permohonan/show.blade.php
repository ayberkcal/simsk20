@extends('dashboard.base')

@section('content')
<div class="col-md-12">
  <div class="nav-tabs-boxed">
    <a class="btn btn-ghost-danger float-right" href="{{ route('permohonan.index') }}"><i class="cil-action-undo"> Back </i></a>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
              <i class="cil-list"></i> Data Permohonan ({{ $surat->no_regist }})
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="home3" role="tabpanel">
          <div class="container">
            <div class="card uper" >
              <div class="card-body">
                <table class="table table-responsive-sm ">
                  <tbody>
                    <tr>
                        <td width="300px"><strong>No. Regist</strong></td>
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
                        <td><strong>Tanggal Permohonan</strong></td>
                        <td>: {{ $surat->tgl_permohonan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tujuan</strong></td>
                        <td>: {{ $surat->tujuan }}</td>
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
                    <tr bgcolor="honeydew">
                        <td><strong>Status</strong></td>
                        <td>: <span class="{{ $surat->statuss->class }}">
                              {{ $status_surat[$surat->status] }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Keterangan</strong></td>
                        <td>: {{ $surat->keterangan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Persyaratan</strong></td>
                        <td>
                          <table class="table table-responsive-sm table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Syarat</th>
                                    <th>Dokumen</th>
                                </tr>
                            </thead>
                            <?php
                                $no = 0;
                            ?>
                            <tbody>
                                @foreach($dokumen as $dokumen)
                                  <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$dokumen->syarat->nama_syarat}}</td>
                                    <td><a href="{{url('file/dokumen/'.$dokumen->nama_file)}}">
                                            <i class="cil-file"></i> {{$dokumen->nama_file}}</a>
                                        </a>
                                    </td>
                                  </tr>
                                @endforeach
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
@endsection