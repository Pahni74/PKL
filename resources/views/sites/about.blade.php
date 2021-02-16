@extends('layouts.frontend')

@section('content')
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    About Us
                </h1>
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> About Us</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>Learn Online Courses</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            Usage of the Internet is becoming more common due to rapid advancement
                            of technology.
                        </p>
                        <a href="#">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>No.1 of universities</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
                        </p>
                        <a href="#">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>Huge Library</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
                        </p>
                        <a href="#">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature Area -->
@stop
