@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Data Kecamatan</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" value="{{ $kecamatan->nama_kecamatan }}" readonly>
                            <label>Kode Kecamatan</label>
                            <input type="number" name="kode_kecamatan" class="form-control" value="{{ $kecamatan->kode_kecamatan }}" readonly>
                            <label>Nama Kota</label>
                            <input type="text" name='kota_id' class="form-control" value="{{$kecamatan->kota->nama_kota}}" readonly>
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
