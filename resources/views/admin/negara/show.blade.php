@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Negara</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Kode Negara</label>
                            <input type="number" name="kode_negara" value="{{ $negara->kode_negara }}" class="form-control"  readonly>
                            <label>Nama Negara</label>
                            <input type="text" name="nama_negara" value="{{ $negara->nama_negara }}" class="form-control"  readonly>
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
