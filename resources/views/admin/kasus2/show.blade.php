@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Data Kasus</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah Positif</label>
                            <input type="number" name="jumlah_positif" class="form-control" value="{{ $kasus2->jumlah_positif }}" placeholder="Jumlah Positif" readonly>
                            <label>Jumlah Sembuh</label>
                            <input type="number" name="jumlah_sembuh" class="form-control" value="{{ $kasus2->jumlah_sembuh }}" placeholder="Jumlah Sembuh" readonly >
                            <label>Jumlah Meninggal</label>
                            <input type="number" name="jumlah_meninggal" class="form-control" value="{{ $kasus2->jumlah_meninggal }}" placeholder="Jumlah Meninggal" readonly >
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ $kasus2->tanggal }}" placeholder="Tanggal" readonly>
                            <label>Nomor Rw</label>
                            <input type="text" name='rw_id' class="form-control" value="{{$kasus2->rw->nama_rw}}" readonly>
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
