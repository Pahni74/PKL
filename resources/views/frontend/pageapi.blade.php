<!DOCTYPE html>
<html lang="">

<head>
    <title>TrackingCovid</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("adminLTE/img/logo.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("adminLTE/img/logo.png")}}">
    <link href="{{ asset('frontend/layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
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
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><a href="{{url('/pageapi')}}">Api</a></li>
                </ul>

            </nav>
        </header>
    </div>
    <div class="bgded overlay" style="background-image:url('{{ asset('frontend/images/demo/backgrounds/corona.jpg') }}');">
        <div id="pageintro" class="hoc clear">
            <article>
                <h3 class="heading">Api Tracking Covid</h3>
                <p>Coronavirus Global & Indonesia Live Data</p>
            </article>
        </div>
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            {{-- <section id="introblocks">
            </section> --}}
            <section class="group shout">
                <div class="card border-primary">
                  <div class="card-body">
                    <h4 class="card-title">Provinsi API</h4>
                    <p class="card-text"><a href="http://127.0.0.1:8000/api/provinsi">http://127.0.0.1:8000/api/provinsi</a></p>
                  </div>
                </div>
                <div class="card border-primary">
                    <div class="card-body">
                      <h4 class="card-title">Kota API</h4>
                      <p class="card-text"><a href="http://127.0.0.1:8000/api/kota">http://127.0.0.1:8000/api/kota</a></p>
                    </div>
                  </div>
                  <div class="card border-primary">
                    <div class="card-body">
                      <h4 class="card-title">Kecamatan API</h4>
                      <p class="card-text"><a href="http://127.0.0.1:8000/api/kecamatan">http://127.0.0.1:8000/api/kecamatan</a></p>
                    </div>
                  </div>
                  <div class="card border-primary">
                    <div class="card-body">
                      <h4 class="card-title">Kelurahan API</h4>
                      <p class="card-text"><a href="http://127.0.0.1:8000/api/kelurahan">http://127.0.0.1:8000/api/kelurahan</a></p>
                    </div>
                  </div>
                  <div class="card border-primary">
                    <div class="card-body">
                      <h4 class="card-title">Rukun Warga API</h4>
                      <p class="card-text"><a href="http://127.0.0.1:8000/api/rw">http://127.0.0.1:8000/api/rw</a></p>
                    </div>
                  </div>
            </section>

            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
    <div class="bgded overlay light" style="background-image:url('{{ asset('frontend/images/demo/backgrounds/corona.jpg') }}');">
        <section id="services" class="hoc container clear">

            <div class="sectiontitle">
                {{-- <h6 class="heading font-x2">Grafik Corona Virus</h6>
                <p class="nospace font-xs">Indonesia</p> --}}
            </div>
        </section>
    </div>
</body>
</section>
</div>
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">

        <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#">Pahni Hanawan</a></p>

    </div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset('frontend/layout/scripts/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/layout/scripts/jquery.backtotop.js') }}"></script>
<script src="{{ asset('frontend/layout/scripts/jquery.mobilemenu.js') }}"></script>
<!-- Homepage specific -->
{{--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}
<script src="{{ asset('frontend/layout/scripts/jquery.easypiechart.min.js') }}"></script>
<!-- / Homepage specific -->
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
</body>

</html>
