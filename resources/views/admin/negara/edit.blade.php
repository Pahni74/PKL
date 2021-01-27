@extends('layouts.master')

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
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
