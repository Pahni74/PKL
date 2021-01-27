@extends("layouts.master")
@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-green elevation-1"><i class="fas fa-heartbeat"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Sembuh</span>
          <span class="info-box-number">
            10
            <small>Orang</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-procedures"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Positif</span>
            <span class="info-box-number">
              10
              <small>Orang</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-skull-crossbones"></i></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Meninggal</span>
          <span class="info-box-number">
            10
            <small>Orang</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-globe-asia"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Indonesia</span>
          <span class="info-box-number">
            10
            <small>Orang</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

@endsection
