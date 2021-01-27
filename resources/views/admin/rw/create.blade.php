@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Rw</div>
                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Rw</label>
                            <input type="number" name="kode_rw" class="form-control" placeholder="Kode Rw" required autofocus>
                            <label>Nama Rw</label>
                            <input type="text" name="nama_rw" class="form-control" placeholder="Nama Rw" required>
                            <label>Nama Kelurahan</label>
                            <select name="kelurahan_id" class="form-control">
                                @foreach ($kelurahan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
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
