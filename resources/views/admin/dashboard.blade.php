@extends('dashboard.base')

@section('content')
<div class="row">
                <div class="col-sm-6 col-md-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-muted text-right mb-4">
                        <svg class="c-icon c-icon-2xl">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-notes"></use>
                        </svg>
                      </div>
                      <div class="text-value-lg">{{$permohonan}}</div><small class="text-muted text-uppercase font-weight-bold">Permohonan (All)</small>
                      <div class="progress progress-xs mt-3 mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-muted text-right mb-4"><span class="badge badge-pill badge-success"> selesai </span>
                        <svg class="c-icon c-icon-2xl">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-letter"></use>
                        </svg>
                      </div>
                      <div class="text-value-lg">{{$surat}}</div><small class="text-muted text-uppercase font-weight-bold">Surat Keluar</small>
                      <div class="progress progress-xs mt-3 mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-muted text-right mb-4"><span class="badge badge-pill badge-secondary"> belum diproses </span>
                        <svg class="c-icon c-icon-2xl">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-file"></use>
                        </svg>
                      </div>
                      <div class="text-value-lg">{{$belum}}</div><small class="text-muted text-uppercase font-weight-bold">Permohonan</small>
                      <div class="progress progress-xs mt-3 mb-0">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-2">
                  <div class="card">
                    <div class="card-body"> 
                      <div class="text-muted text-right mb-4"><span class="badge badge-pill badge-danger"> ditolak </span>
                        <svg class="c-icon c-icon-2xl">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-x-circle"></use>
                        </svg>
                      </div>
                      <div class="text-value-lg">{{$ditolak}}</div><small class="text-muted text-uppercase font-weight-bold">Permohonan</small>
                      <div class="progress progress-xs mt-3 mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-muted text-right mb-4">
                        <svg class="c-icon c-icon-2xl">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-loop-circular"></use>
                        </svg>
                      </div>
                      <div class="text-value-lg">{{$proses}}</div><small class="text-muted text-uppercase font-weight-bold">Permohonan <span class="badge badge-pill badge-warning"><font style="font-size: 80%"> in process </font></span></small>
                      <div class="progress progress-xs mt-3 mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-muted text-right mb-4">
                        <svg class="c-icon c-icon-2xl">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-clipboard"></use>
                        </svg>
                      </div>
                      <div class="text-value-lg">{{$layanan}}</div><small class="text-muted text-uppercase font-weight-bold">Layanan</small>
                      <div class="progress progress-xs mt-3 mb-0">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->              

@endsection