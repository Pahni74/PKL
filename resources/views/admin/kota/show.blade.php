@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Data Kota</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control" value="{{ $kota->nama_kota }}" readonly>
                            <label>Kode Kota</label>
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
