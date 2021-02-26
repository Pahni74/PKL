@extends('layouts.master')
@section('breadcrumb')
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Data</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Data Kelurahan / Desa</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Kode Kelurahan / Desa</label>
                            <input type="text" name="kode_kelurahan" class="form-control" value="{{ $kelurahan->kode_kelurahan }}" readonly>
                            <label>Nama Kelurahan / Desa</label>
                            <input type="text" name="nama_kelurahan" class="form-control" value="{{ $kelurahan->nama_kelurahan }}" readonly>
                            <label>Nama Kecamatan</label>
                            <input type="text" name='kecamatan_id' class="form-control" value="{{$kelurahan->kecamatan->nama_kecamatan}}" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
