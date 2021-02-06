@extends("layouts.master")
@section('breadcrumb')
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        @if(Session::has('sukses'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					{{ Session::get('sukses') }}
				</div>
                @endif
                @if(Session::has('gagal'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
					{{ Session::get('gagal') }}
				</div>
				@endif
      <div class="info-box mb-3">
        <span class="info-box-icon bg-green elevation-1"><i class="fas fa-heartbeat"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Sembuh</span>
          <span class="info-box-number">
            {{ \DB::table('trackings')->sum('jumlah_sembuh') }}
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
                {{ \DB::table('trackings')->sum('jumlah_positif') }}
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
            {{ \DB::table('trackings')->sum('jumlah_meninggal') }}
            <small>Orang</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
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
    <!-- /.col -->
  </div>

@endsection
