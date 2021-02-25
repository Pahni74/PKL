<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tracking Covid</title>
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
                    <p class="lead m-0 text-center">API</p>
                </div>
            </div>
            <!-- COL END -->
        </div>
        <br>
        <div class="card mb-4">
        <div class="card">
            <div class="card-header">Provinsi API</div>
                <div class="card-body">
                    <a href="http://trackingcovidid.herokuapp.com/api/provinsi">http://trackingcovidid.herokuapp.com/api/provinsi</a>
                </div>
        </div>
        </div>
        <div class="card mb-4">
            <div class="card">
                <div class="card-header">Kabupaten / Kota API</div>
                    <div class="card-body">
                        <a href="http://trackingcovidid.herokuapp.com/api/kota">http://trackingcovidid.herokuapp.com/api/kota</a>
                    </div>
            </div>
            </div>
            <div class="card mb-4">
                <div class="card">
                    <div class="card-header">Kecamatan API</div>
                        <div class="card-body">
                            <a href="http://trackingcovidid.herokuapp.com/api/kecamatan">http://trackingcovidid.herokuapp.com/api/kecamatan</a>
                        </div>
                </div>
                </div>
                <div class="card mb-4">
                    <div class="card">
                        <div class="card-header">Kelurahan / Desa API</div>
                            <div class="card-body">
                                <a href="http://trackingcovidid.herokuapp.com/api/kelurahan">http://trackingcovidid.herokuapp.com/api/kelurahan</a>
                            </div>
                    </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card">
                            <div class="card-header">Rukun Warga API</div>
                                <div class="card-body">
                                    <a href="http://trackingcovidid.herokuapp.com/api/rw">http://trackingcovidid.herokuapp.com/api/rw</a>
                                </div>
                        </div>
                        </div>
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
