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
                <li class="breadcrumb-item"><a href="{{ route('kota.index') }}">Kota</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</a></li>
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
                <div class="card-header">Ubah Daftar Kabupaten / Kota</div>
                <div class="card-body">
                    <form action="{{route('kota.update',$kota->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Kode Kabupaten / Kota</label>
                            <input type="text" name="kode_kota" class="form-control" value="{{ $kota->kode_kota }}" placeholder="Kode Kota" required >
                            <label>Nama Kabupaten / Kota</label>
                            <input type="text" name="nama_kota" class="form-control" value="{{ $kota->nama_kota }}" placeholder="Nama Kota" required autofocus>
                            <label>Nama Provinsi</label>
                            <select name="provinsi_id" class="form-control" required>
                                @foreach ($provinsi as $data)
                                <option value="{{$data->id}}" {{$data->id == $kota->provinsi_id ? 'selected' : ''}} >{{$data->nama_provinsi}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ url()->previous() }}" class="btn btn-warning btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
