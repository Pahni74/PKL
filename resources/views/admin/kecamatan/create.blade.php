@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kecamatan</div>
                <div class="card-body">
                    <form action="{{route('kecamatan.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Kecamatan</label>
                            <input type="number" name="kode_kecamatan" class="form-control" placeholder="Kode Kecamatan" required autofocus>
                            <label>Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" placeholder="Nama Kecamatan" required>
                            <label>Nama Kota</label>
                            <select name="kota_id" class="form-control">
                                @foreach ($kota as $data)
                                <option value="{{$data->id}}">{{$data->nama_kota}}</option>
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
