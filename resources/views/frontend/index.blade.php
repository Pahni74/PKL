<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kawal Corona</title>
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("adminLTE/img/logo.png ")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("adminLTE/img/logo.png ")}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <!-- Font Awesome Icons -->
    <!-- overlayScrollbars -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{asset('adminLTE/styles.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- DataTables -->
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-brand">TRACKING COVID</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}"> <i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pageapi') }}">Api</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="content">
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
                                        <?php echo $positif['value'] ?>
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
                                    <h2 class="mb-0 number-font">
                                        <?php echo $sembuh['value'] ?>
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
                                    <h2 class="mb-0 number-font">
                                        <?php echo $meninggal['value'] ?>
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
            <!-- COL END -->

            <div class="col text-center">
                {{-- <p>Update terakhir : {{ $tanggal }}</p> --}}
            </div>
        </div>
        <br>
        <div class="card mb-4">
            <div class="card-header">
               Chart Covid 19
            </div>
            <div class="card-body">
                {!! $chart->container() !!}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                {!! $chart->script() !!}
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Data Global Coronavirus
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-black">
                                <th scope="col">NO</th>
                                <th scope="col">NEGARA</th>
                                <th scope="col">POSITIF</th>
                                <th scope="col">SEMBUH</th>
                                <th scope="col">MENINGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp @foreach($dunia as $data)
                            <tr>
                                <td>{{$no++ }}</td>
                                <td><?php echo $data['attributes']['Country_Region'] ?></td>
                                <td><?php echo number_format($data['attributes']['Confirmed']) ?></td>
                                <td><?php echo number_format($data['attributes']['Recovered'])?></td>
                                <td><?php echo number_format($data['attributes']['Deaths'])?></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                            @php $no=1; @endphp @foreach($provinsi as $data)
                            <tr>
                                <td scope="row">{{$no++}}</td>
                                <td>{{$data->nama_provinsi}}</td>
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
        </main>
    </section>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; TrackingCovid 2021</div>
            </div>
        </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

        <script>
            $(function() {
                $('#example1').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    "scrollY": 450,
                    "scrollX": true,
                });
                $('#example2').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    "scrollY": 50,
                    "scrollX": true,
                });
            });
        </script>
    </footer>
</body>

</html>
