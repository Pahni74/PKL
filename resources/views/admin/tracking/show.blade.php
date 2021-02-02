@extends('layouts.master')
@section('content')

<div class="form-group row ">
    <div class="col-md-6">
        <label>Provinsi</label>
        <input type="text" value="{{$tracking->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" class="form-control" readonly>
    </div>
    <div class="col-md-6">
        <label>Jumlah Reaktif</label>
        <input type=number value="{{ $tracking->jumlah_reaktif}}" class=form-control  readonly>
    </div>
</div>
<div class="form-group row ">
    <div class="col-md-6">
        <label>Kota / Kabupaten</label>
        <input type="text" value="{{$tracking->rw->kelurahan->kecamatan->kota->nama_kota}}" class="form-control" readonly>
    </div>
    <div class="col-md-6">
        <label>Total Sembuh</label>
        <input type="number" value="{{$tracking->jumlah_sembuh}}" class="form-control" readonly>
    </div>
</div>
<div class="form-group row ">
    <div class="col-md-6">
        <label>Kecamatan</label>
        <input type="text"  value="{{$tracking->rw->kelurahan->kecamatan->nama_kecamatan}}" class="form-control" readonly>
    </div>
    <div class="col-md-6">
        <label>Total Meninggal</label>
        <input type="number"  value="{{$tracking->jumlah_meninggal}}" class="form-control" readonly>
    </div>
</div>
<div class="form-group row ">
    <div class="col-md-6">
        <label>Kelurahan /  kelurahan</label>
        <input type="text"  value="{{$tracking->rw->kelurahan->nama_kelurahan}}" class="form-control" readonly>
    </div>
    <div class="col-md-6">
        <label>Total Positif</label>
        <input type="number" value="{{$tracking->jumlah_positif}}" class="form-control" readonly>
    </div>
</div>
<div class="form-group row ">
    <div class="col-md-6">
        <label>Rw</label>
        <input type="text"  value="{{$tracking->rw->nama_rw}}" class="form-control" readonly>
    </div>
    <div class="col-md-6">
        <label>Tanggal</label>
        <input type="date"  value="{{$tracking->tanggal}}" class="form-control" readonly>
    </div>
</div>
<div class="form-group">
    <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
</div>
</div>

@endsection
