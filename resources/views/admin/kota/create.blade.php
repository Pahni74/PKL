@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kota</div>
                <div class="card-body">
                    <form action="{{route('kota.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Kota</label>
                            <input type="number" name="kode_kota" class="form-control" placeholder="Kode Kota" required autofocus>
                            <label>Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control" placeholder="Nama Kota" required>
                            <label>Nama Provinsi</label>
                            <select name="provinsi_id" class="form-control">
                                @foreach ($provinsi as $data)
                                <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
