@extends('layouts.master')
@section('breadcrumb')
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tracking</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">Tracking Covid <a class="btn btn-primary btn-sm btn-rounded" href="{{route('tracking.create')}}"><i class="fa fa-plus"></i></a></a></h4>

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
                                    <h4><i class="icon fa fa-ban"></i>Gagal!</h4>
                                    {{ Session::get('gagal') }}
                                </div>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-blue">
                                            <th scope="col">No</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Rukun Warga</th>
                                            <th scope="col">Positif</th>
                                            <th scope="col">Sembuh</th>
                                            <th scope="col">Meninggal</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1;
                                    @endphp
                                    @foreach($tracking as $data)

                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}<br>Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>Kelurahan : {{$data->rw->kelurahan->nama_kelurahan}}</td>
                                            <td>{{$data->rw->nama_rw}}</td>
                                            <td>{{$data->jumlah_positif}}</td>
                                            <td>{{$data->jumlah_sembuh}}</td>
                                            <td>{{$data->jumlah_meninggal}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>
                                            <form action="{{route('tracking.destroy',$data->id)}}"  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('tracking.show',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm btn-rounded " href="{{route('tracking.edit',$data->id)}}"> <i class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')"><i class="fa fa-trash"></i></button>
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
@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
