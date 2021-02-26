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
                <li class="breadcrumb-item"><a href="{{ route('rw.index') }}">Rukun Warga</a></li>
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
                <div class="card-header">Detail Data Rukun Warga</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Kode text Warga</label>
                            <input type="number" name="kode_rw" class="form-control" value="{{ $rw->kode_rw }}" readonly>
                            <label>Nomer Rukun Warga</label>
                            <input type="number" name="nomer_rw" class="form-control" value="{{ $rw->nomer_rw }}" readonly>
                            <label>Nama Kelurahan / Desa</label>
                            <input type="text" name='kelurahan_id' class="form-control" value="{{$rw->kelurahan->nama_kelurahan}}" readonly>
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
