@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tracking.update',$tracking->id)}}" class="form-horizontal m-t-30" method="POST">
                @csrf
                @method('PUT')
                @livewireScripts
                @livewire('hello-livewire',['selectedRw' => $tracking->rw_id,'idt' => $tracking->id])
                @livewireStyles
                <div class="form-group">
                <button type="submit" class="btn btn-info">Tambah</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
