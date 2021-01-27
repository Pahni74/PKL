@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Negara</div>
                <div class="card-body">
                    <form action="{{route('negara.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Negara</label>
                            <input type="number" name="kode_negara" class="form-control" placeholder="kode Negara" required autofocus>
                            <label>Nama Negara</label>
                            <input type="text" name="nama_negara" class="form-control" placeholder="Nama Negara" required>

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
