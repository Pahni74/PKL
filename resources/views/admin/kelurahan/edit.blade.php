@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Daftar Kelurahan</div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Kode Kelurahan</label>
                            <input type="number" name="kode_kelurahan" class="form-control" value="{{ $kelurahan->kode_kelurahan }}" placeholder="Kode Kelurahan" required autofocus>
                            <label>Nama Kelurahan</label>
                            <input type="text" name="nama_kelurahan" class="form-control" value="{{ $kelurahan->nama_kelurahan }}" placeholder="Nama Kelurahan" required>
                            <label>Nama Kecamatan</label>
                            <select name="kecamatan_id" class="form-control" required>
                                @foreach ($kecamatan as $data)
                                <option value="{{$data->id}}" {{$data->id == $kelurahan->kecamatan_id ? 'selected' : ''}} >{{$data->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                            </div>
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
