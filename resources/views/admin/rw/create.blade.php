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
                <li class="breadcrumb-item"><a href="{{ route('rw.index') }}">Rukun Warga</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</a></li>
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
                <div class="card-header">Tambah Rukun Warga</div>
                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Rukun Warga</label>
                            <input type="number" name="kode_rw" class="form-control" placeholder="Kode Rw" required autofocus>
                            <label>Nomer Rukun Warga</label>
                            <input type="number" name="nomer_rw" class="form-control" placeholder="Nomer Rw" required>
                            <label>Nama Kelurahan / Desa</label>
                            <select name="kelurahan_id" class="form-control">
                                @foreach ($kelurahan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
                                @endforeach
                            </select>
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
