@extends('dashboard.base')

@section('content')
<div class="col-md-12">
  <div class="nav-tabs-boxed">
    <a class="btn btn-ghost-danger float-right" href="{{ route('suratkeluar.index') }}"><i class="cil-action-undo"> Back </i></a>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#surat1" role="tab" aria-controls="surat1" aria-selected="true">
              <i class="cil-list-rich"></i> Data Surat Keluar ({{ $surat->no_regist }})
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
            <div class="card uper" >
              <div class="card-body">
                <table class="table table-responsive-sm">
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
                        <td><strong>Nomor Surat</strong></td>
                        <td>: {{ $surat->no_surat }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Surat</strong></td>
                        <td>: {{$surat->tgl_surat}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Permohonan</strong></td>
                        <td>: {{ $surat->tgl_permohonan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tujuan</strong></td>
                        <td>: {{ $surat->tujuan }}</td>
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
                        <td><strong>File</strong></td>
                        <td>: <a href="{{url('file/surat/'.$surat->nama_file)}}"><i class="cil-description"></i> {{$surat->nama_file}}</a></td>
                    </tr>
                    <tr bgcolor="lightgreen">
                        <td><strong>Status</strong></td>
                        <td>: <span class="{{ $surat->statuss->class }}"> 
                              {{$surat->statuss->name}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Keterangan</strong></td>
                        <td>: {{ $surat->keterangan }}</td>
                    </tr> 
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
                            <?php
                                $no = 0;
                            ?>
                            <tbody>
                                @foreach($dokumen as $dokumen)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$dokumen->syarat->nama_syarat}}</td>
                                    <td><a href="{{url('file/dokumen/'.$dokumen->nama_file)}}">
                                            <i class="cil-file"></i> {{$dokumen->nama_file}}
                                        </a>
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
                  </tbody>
                 </table>
              </div>  
            </div>
           </div>
          </div>
        </div>
        <div class="tab-pane" id="surat2" role="tabpanel">
            <div class="container">
            <div class="card uper" >
             <embed width="1000" height="450" src="{{url('file/surat/'.$surat->nama_file)}}" type="application/pdf"></embed>
         </div></div>
        </div>
    </div>
  </div>
</div>
@endsection