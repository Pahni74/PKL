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
                <li class="breadcrumb-item"><a href="{{ route('negara.index') }}">Negara</a></li>
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
                <div class="card-header">Edit Negara</div>
                <div class="card-body">
                        <div class="form-group">
                            <form action="{{route('negara.update',$negara->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <label>Kode Negara</label>
                                <input type="number" name="kode_negara" class="form-control" value="{{ $negara->kode_negara }}" placeholder="kode Negara" required autofocus>
                                <label>Nama Negara</label>
                                <input type="text" name="nama_negara" class="form-control" value="{{ $negara->nama_negara }}" placeholder="Nama Negara" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Ubah Data</button>
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
</div>
@endsection
