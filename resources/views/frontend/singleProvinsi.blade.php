@extends("frontend.layouts.master")
@section('content')
<div class="container-fluid">
            <div class="jumbotron">
                <div class="container">
                    <br>
                    <h1 class="display-4 text-center">TRACKING COVID</h1>
                    <p class="lead m-0 text-center">Coronavirus Global &amp; Indonesia Live Data</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-warning img-card box-primary-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-white mb-0">TOTAL POSITIF</p>
                                    <h2 class="mb-0 number-font">
                                        {{ $jumlah_positif }}
                                    </h2>
                                    <p class="text-white mb-0">ORANG</p>
                                </div>
                                <div class="ml-auto"> <img src="{{ asset('adminLTE/img/Sad.png') }}" width="70" height="70" alt="Positif"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-success img-card box-secondary-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-white mb-0">TOTAL SEMBUH</p>
                                    <h2 class="mb-0 number-font">{{ $jumlah_sembuh }}
                                    </h2>
                                    <p class="text-white mb-0">ORANG</p>
                                </div>
                                <div class="ml-auto"> <img src="{{ asset('adminLTE/img/happy.png') }}" width="70" height="70" alt="Positif"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card  bg-red img-card box-success-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-white mb-0">TOTAL MENINGGAL</p>
                                    <h2 class="mb-0 number-font">{{ $jumlah_meninggal }}
                                    </h2>
                                    <p class="text-white mb-0">ORANG</p>
                                </div>
                                <div class="ml-auto"> <img src="{{ asset('adminLTE/img/cry.png') }}" width="70" height="70" alt="Positif"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card  bg-info img-card box-success-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <h2 class="text-white mb-0">INDONESIA</h2>
                                    <p class="mb-0 number-font"><b>{{$jumlah_positif}}</b> POSITIF, <b>{{$jumlah_sembuh}}</b> SEMBUH, <b>{{$jumlah_meninggal}}</b> MENINGGAL</p>
                                </div>
                                <div class="ml-auto"> <img src="{{asset('adminLTE/img/indonesia.png')}}" width="50" height="50" alt="Positif"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
            </div>
        </div>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                Data Coronavirus Berdasarkan Provinsi di Negara Indonesia
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-black">
                                <th scope="col">NO</th>
                                <th scope="col">PROVINSI</th>
                                <th scope="col">POSITIF</th>
                                <th scope="col">SEMBUH</th>
                                <th scope="col">MENINGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($provinsis as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $data->nama_provinsi }}</td>
                                <td>{{$data->positif}}</td>
                                <td>{{$data->sembuh}}</td>
                                <td>{{$data->meninggal}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
@endsection
