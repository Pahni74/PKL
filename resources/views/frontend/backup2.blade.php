<!DOCTYPE html>
<html lang="">

<head>
    <title>TrackingCovid</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{ asset('frontend2/layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset(" adminLTE/img/logo.png ")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset(" adminLTE/img/logo.png ")}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
</head>

<body id="top">
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">

                <h1 class="logoname"><a href="{{ url('/') }}">Tracking<span>C</span>ovid</a></h1>

            </div>
            <nav id="mainav" class="fl_right">

                <ul class="clear">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{url('/api')}}">Api</a></li>
                </ul>

            </nav>
        </header>
    </div>
    <div class="bgded overlay" style="background-image:url('{{ asset('frontend2/images/demo/backgrounds/corona.jpg') }}');">
        <div id="pageintro" class="hoc clear">

            <article>
                <h3 class="heading">Tracking Covid</h3>
                <p>Coronavirus Global & Indonesia Live Data</p>
            </article>

        </div>
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <section id="introblocks">
                <ul class="nospace group btmspace-80 elements elements-four">
                    <li class="one_quarter">
                        <article><i class="fas fa-procedures"></i>
                            <h6 class="heading">POSITIF</h6>
                            <h6>
                                <?php echo $positif['value'] ?>
                            </h6>
                            <p>Orang</p>
                        </article>
                    </li>
                    <li class="one_quarter">
                        <article><i class="fas fa-heartbeat"></i>
                            <h6 class="heading">SEMBUH</h6>
                            <h6>
                                <?php echo $sembuh['value'] ?>
                            </h6>
                            <p>Orang</p>
                        </article>
                    </li>
                    <li class="one_quarter">
                        <article><i class="fas fa-skull-crossbones"></i>
                            <h6 class="heading">MENINGGAL</h6>
                            <h6>
                                <?php echo $meninggal['value'] ?>
                            </h6>
                            <p>Orang</p>
                        </article>
                    </li>
                    <li class="one_quarter">
                        <article><i class="fas fa-globe-asia"></i>
                            <h6 class="heading">INDONESIA</h6>
                            <p><b>{{$jumlah_positif}}</b> POSITIF, <b>{{$jumlah_sembuh}}</b> SEMBUH, <b>{{$jumlah_meninggal}}</b> MENINGGAL</p>
                        </article>
                    </li>
                </ul>
            </section>
            <section class="group shout">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h3><b>Data Global Coronavirus</b></h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-blue">
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
                                        <td>
                                            <?php echo $data['attributes']['Country_Region'] ?>
                                            </th>
                                            <td>
                                                <?php echo number_format($data['attributes']['Confirmed']) ?>
                                                </th>
                                                <td>
                                                    <?php echo number_format($data['attributes']['Recovered'])?>
                                                    </th>
                                                    <td>
                                                        <?php echo number_format($data['attributes']['Deaths'])?>
                                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <center>
                            <br>
                            <h3><b>Data Provinsi Coronavirus</b></h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-blue">
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

            </section>

            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
    <div class="bgded overlay light" style="background-image:url('{{ asset('frontend2/images/demo/backgrounds/corona.jpg') }}');">
        <section id="services" class="hoc container clear">

            <div class="sectiontitle">
                <h6 class="heading font-x2">Grafik Corona Virus</h6>
                <p class="nospace font-xs">Indonesia</p>
            </div>
            <div id="container"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var datas = <?php echo json_encode($datas) ?>;

    Highcharts.chart('container', {
        title: {
            text: 'Statistik Coronavirus Di Indonesia'
        },
        subtitle: {
            text: 'Source: itsolutionstuff.com.com'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Positif'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Positif',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
</section>
</div>
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">

        <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#">Pahni Hanawan</a></p>

    </div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset('frontend2/layout/scripts/jquery.min.js') }}"></script>
<script src="{{ asset('frontend2/layout/scripts/jquery.backtotop.js') }}"></script>
<script src="{{ asset('frontend2/layout/scripts/jquery.mobilemenu.js') }}"></script>
<!-- Homepage specific -->
{{--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}
<script src="{{ asset('frontend2/layout/scripts/jquery.easypiechart.min.js') }}"></script>
<!-- / Homepage specific -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
    $(function() {
        // $("#example1").DataTable();
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
</body>

</html>
