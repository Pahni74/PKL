@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kasus</div>
                <div class="card-body">
                    <form action="{{route('kasus2.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Jumlah Positif</label>
                            <input type="number" name="jumlah_positif" class="form-control" placeholder="Jumlah Positif" required autofocus>
                            <label>Jumlah Sembuh</label>
                            <input type="number" name="jumlah_sembuh" class="form-control" placeholder="Jumlah Sembuh" required >
                            <label>Jumlah Meninggal</label>
                            <input type="number" name="jumlah_meninggal" class="form-control" placeholder="Jumlah Meninggal" required >
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                            <label>Nomor Rw</label>
                            <select name="rw_id" class="form-control">
                                @foreach ($rw as $data)
                                <option value="{{$data->id}}">{{$data->nama_rw}}</option>
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
