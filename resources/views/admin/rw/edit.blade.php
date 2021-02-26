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
                <li class="breadcrumb-item active" aria-current="page">edit Data</a></li>
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
                <div class="card-header">Ubah Daftar Rukun Warga</div>
                <div class="card-body">
                    <form action="{{route('rw.update',$rw->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Kode Rukun Warga</label>
                            <input type="text" name="kode_rw" class="form-control" value="{{ $rw->kode_rw }}" placeholder="Kode Rw" required autofocus>
                            <label>Nama Rukun Warga</label>
                            <input type="number" name="nomer_rw" class="form-control" value="{{ $rw->nomer_rw }}" placeholder="Nama Rw" required>
                            <label>Nama Kelurahan / Desa</label>
                            <select name="kelurahan_id" class="form-control" required>
                                @foreach ($kelurahan as $data)
                                <option value="{{$data->id}}" {{$data->id == $rw->kelurahan_id ? 'selected' : ''}} >{{$data->nama_kelurahan}}</option>
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
