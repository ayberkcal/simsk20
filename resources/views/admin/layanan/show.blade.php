@extends('dashboard.base')

@section('content')
<div class="col-md-12">
      <div class="nav-tabs-boxed">
        <a class="btn btn-ghost-danger float-right" href="{{ route('layanan.index') }}"><i class="cil-action-undo"> Back </i></a>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#layanan" role="tab" aria-controls="layanan" aria-selected="true">
                  <i class="cil-list-rich"></i> Data Layanan ({{ $layanan->kode_layanan }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#persyaratan" role="tab" aria-controls="persyaratan" aria-selected="false">
                  <i class="cil-task"></i> Persyaratan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#penandatangan" role="tab" aria-controls="penandatangan" aria-selected="false">
                  <i class="cil-pencil"></i> Penanda Tangan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#field" role="tab" aria-controls="field" aria-selected="false">
                  <i class="cil-grid"></i> Field
                </a>
            </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="layanan" role="tabpanel">
            <div class="card uper col">
              <div class="card-body">
                <table class="table table-responsive-sm ">
                  <tbody>
                        <tr>
                            <td width="300px"><strong>Kode Layanan</strong></td>
                            <td>: {{ $layanan->kode_layanan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Sub-klasifikasi</strong></td>
                            <td>: {{ $layanan->subklasifikasi->sub_klasifikasi }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Layanan</strong></td>
                            <td>: {{ $layanan->nama_layanan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Template File</strong></td>
                            <td>: <a href="{{url('file/template/'.$layanan->template_file)}}">
                                      <i class="cil-description"></i> {{$layanan->template_file}}
                                  </a>
                            </td>
                        </tr>
                  </tbody>
                </table>
              </div> 
            </div>
          </div>
          <div class="tab-pane" id="persyaratan" role="tabpanel">
            <div class="card uper  col-lg-6">
                  <div class="card-body">
                    <table class="table table-responsive-sm" width="300px">
                      <?php $no = 0; ?>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Syarat</th>
                              <th>Tipe File</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($syarat as $syarats)
                          <tr>
                             <td>{{++$no}}</td>
                             <td>{{$syarats->syarat->nama_syarat}}</td>
                             <td>{{$tipe_file[$syarats->syarat->tipe_file]}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
          <div class="tab-pane" id="penandatangan" role="tabpanel">
            <div class="card uper col-lg-6">
                  <div class="card-body">
                    <table class="table table-responsive-sm" width="300px">
                      <?php $num = 0; ?>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nama Penanda Tangan</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($penandatangan as $penandatangan)
                          <tr>
                             <td>{{++$num}}</td>
                             <td>{{$penandatangan->user->nama}}</td>
                             <td>{{$status_ttd[$penandatangan->status]}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <small>(diurutkan berdasarkan hierarki)</small>
                  </div>
                </div>
          </div>
          <div class="tab-pane" id="field" role="tabpanel">
            <div class="card uper col-lg-6" >
                  <div class="card-body">
                    <table class="table table-responsive-sm" width="300px">
                      <?php $num = 0; ?>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Kolom</th>
                              <th>Tipe Kolom</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($field as $field)
                          <tr>
                             <td>{{++$num}}</td>
                             <td>{{$field->nama_field}}</td>
                             <td>{{$tipe_field[$field->tipe_field]}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                  </div>
            </div>
          </div>             
        </div>
      </div>
</div>
@endsection