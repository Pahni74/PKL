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
                <li class="breadcrumb-item"><a href="{{ route('kota.index') }}">Kota</a></li>
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
                <div class="card-header">Detail Data Kabupaten / Kota</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kabupaten / Kota</label>
                            <input type="text" name="nama_kota" class="form-control" value="{{ $kota->nama_kota }}" readonly>
                            <label>Kode Kabupaten / Kota</label>
                            <input type="number" name="kode_kota" class="form-control" value="{{ $kota->kode_kota }}" readonly>
                            <label>Nama Provinsi</label>
                            <input type="text" name='provinsi_id' class="form-control" value="{{$kota->provinsi->nama_provinsi}}" readonly>
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
