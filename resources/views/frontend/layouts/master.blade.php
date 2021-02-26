<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.layouts.head')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        @include('frontend.layouts.nav')
    </nav>
    <section class="content">
    @yield('content')
    </section>
    <footer class="py-4 bg-light mt-auto">
  @include('frontend.layouts.scripts')
    </footer>
</body>

</html>
