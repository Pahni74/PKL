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
                <li class="breadcrumb-item"><a href="{{ route('provinsi.index') }}">Provinsi</a></li>
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
                <div class="card-header">Show Provinsi</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Kode Provinsi</label>
                            <input type="text" name="kode_provinsi" value="{{ $provinsi->kode_provinsi }}" class="form-control"  readonly>
                            <label>Nama Provinsi</label>
                            <input type="text" name="nama_provinsi" value="{{ $provinsi->nama_provinsi }}" class="form-control"  readonly>
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
