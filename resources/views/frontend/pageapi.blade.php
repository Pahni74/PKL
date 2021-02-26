@extends("frontend.layouts.master")
@section('content')
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
@endsection
