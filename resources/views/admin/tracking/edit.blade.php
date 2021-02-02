@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Tracking
                </div>
                <div class="card-body">
                    <form action="{{route('tracking.update',$tracking->id)}}" class="form-horizontal m-t-30" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                @livewire('hello-livewire',['selectedRw' => $tracking->rw_id,'idt' => $tracking->id])
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Jumlah reaktif</label>
                                    <input type=number name=jumlah_reaktif class=form-control value={{$tracking->jumlah_reaktif}} required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Positif</label>
                                    <input type=number name=jumlah_positif class=form-control value={{$tracking->jumlah_positif}} required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Sembuh</label>
                                    <input type=number name=jumlah_sembuh class=form-control value={{$tracking->jumlah_sembuh}} required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Meninggal</label>
                                    <input type=number name=jumlah_meninggal class=form-control value={{$tracking->jumlah_meninggal}} required>
                                </div>
                                <div class="form-group">
                                    <label for="">tanggal</label>
                                    <input type=date name=tanggal class=form-control value={{$tracking->tanggal}} required>
                                </div>
                            </div>
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
