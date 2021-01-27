@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Provinsi</div>
                <div class="card-body">
                        <div class="form-group">
                            <form action="{{route('provinsi.update',$provinsi->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <label>Kode Provinsi</label>
                                <input type="number" name="kode_provinsi" class="form-control" value="{{ $provinsi->kode_provinsi }}" placeholder="kode Provinsi" required autofocus>
                                <label>Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" value="{{ $provinsi->nama_provinsi }}" placeholder="Nama Provinsi" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Ubah Data</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
