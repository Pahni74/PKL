@extends('layouts.master')
@section('breadcrumb')
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('negara.index') }}">Negara</a></li>
              <li class="breadcrumb-item active" aria-current="page">Kasus</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">List Kasus
                                    <a class="btn btn-primary btn-sm btn-rounded" href="{{route('kasus.create')}}"><i class="fa fa-plus"></i></a></h4>

                                @if(Session::has('sukses'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                                    {{ Session::get('sukses') }}
                                </div>
                                @endif

                                @if(Session::has('gagal'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                    {{ Session::get('gagal') }}
                                </div>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Jumlah Positif</th>
                                            <th scope="col">Jumlah Sembuh</th>
                                            <th scope="col">Jumlah Meninggal</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama Negara</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1;
                                    @endphp
                                    @foreach($kasus as $data)

                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>{{$data->jumlah_positif}}</td>
                                            <td>{{$data->jumlah_sembuh}}</td>
                                            <td>{{$data->jumlah_meninggal}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->negara->nama_negara}}</td>
                                            <td>
                                            <form action="{{route('kasus.destroy',$data->id)}}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('kasus.show',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm btn-rounded " href="{{route('kasus.edit',$data->id)}}"> <i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
