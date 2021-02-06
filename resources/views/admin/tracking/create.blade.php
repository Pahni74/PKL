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
                <li class="breadcrumb-item"><a href="{{ route('tracking.index') }}">Tracking</a></li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Tambah Data
                </div>
                <div class="card-body">
                    <form action="{{route('tracking.store')}}" class="form-horizontal m-t-30" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                @livewire('hello-livewire')
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Jumlah Positif</label>
                                    <input type=number name=jumlah_positif class=form-control  required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Sembuh</label>
                                    <input type=number name=jumlah_sembuh class=form-control  required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Meninggal</label>
                                    <input type=number name=jumlah_meninggal class=form-control  required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type=date name=tanggal class=form-control required>
                                </div>
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
