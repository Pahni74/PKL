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
                <li class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
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
                <div class="card-header">Ubah Daftar Kecamatan</div>
                <div class="card-body">
                    <form action="{{route('kecamatan.update',$kecamatan->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Kode Kecamatan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" value="{{ $kecamatan->kode_kecamatan }}" placeholder="Kode Kecamatan" required autofocus>
                            <label>Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" value="{{ $kecamatan->nama_kecamatan }}" placeholder="Nama Kecamatan" required>
                            <label>Nama Kabupaten / Kota</label>
                            <select name="kota_id" class="form-control" required>
                                @foreach ($kota as $data)
                                <option value="{{$data->id}}" {{$data->id == $kecamatan->kota_id ? 'selected' : ''}} >{{$data->nama_kota}}</option>
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
