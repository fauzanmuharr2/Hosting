<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tracking Covid</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/assets/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/assets/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand " href="#page-top">Tracking Covid</a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Dashboard</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link nav-link-bg">
                    <i class="fe fe-maximize fullscreen-button"></i>
                </a>
            </div><!-- FULL-SCREEN -->
        </div>
    </nav>
    <!-- Masthead-->
    <div class="container-fluid">
        <header class="masthead bg">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4 text-center">Tracking Covid</h1>
                    <p class="lead m-0 text-center">Coronavirus Indonesia & Global</p>
                    <br>
                    <div class="row h-50 align-items-center justify-content-center text-center">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card bg-danger img-card box-primary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <p class="text-white mb-0"><b>Total Positif</b></p>
                                            <h2 class="mb-0 number-font">{{ number_format($positif) }}</h2>
                                            <p class="text-white mb-0">Orang</p>
                                        </div>
                                        <div class="ml-auto"> <img src="{{ asset('assets/assets/img/sedih.png') }}"
                                                width="50" height="50"> </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card bg-dark img-card box-primary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <p class="text-white mb-0"><b>Total Meninggal</b></p>
                                            <h2 class="mb-0 number-font">{{ number_format($meninggal) }}</h2>
                                            <p class="text-white mb-0">Orang</p>
                                        </div>
                                        <div class="ml-auto"> <img
                                                src="{{ asset('assets/assets/img/meninggal.png') }}" width="50"
                                                height="50"> </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card bg-success img-card box-primary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <p class="text-white mb-0"><b>Total Sembuh</b></p>
                                            <h2 class="mb-0 number-font">{{ number_format($sembuh) }} </h2>
                                            <p class="text-white mb-0">Orang</p>
                                        </div>
                                        <div class="ml-auto"> <img src="{{ asset('assets/assets/img/sembuh.png') }}"
                                                width="50" height="50"> </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="card-header ">
                        <h5 class="card-title">Data Kasus Corona virus di Indonesia Berdasarkan Provinsi</h5>
                    </div>
                    <div class="card-body">
                        <div style="height:600px;overflow:auto;margin-right:15px;">
                            <table class="table table-striped" fixed-header>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Meninggal</th>
                                        <th scope="col">Sembuh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($tampil as $tmp)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $tmp->nama_provinsi }}</td>
                                            <td>{{ number_format($tmp->jumlah_positif) }}</td>
                                            <td>{{ number_format($tmp->jumlah_meninggal) }}</td>
                                            <td>{{ number_format($tmp->jumlah_sembuh) }}</td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <hr size="100px" width="100%">
                    <div class="card-header ">
                        <h5 class="card-title">Data Kasus Corona virus Global</h5>
                    </div>
                    <div class="card-body">
                        <div style="height:600px;overflow:auto;margin-right:15px;">
                            <table class="table table-striped" fixed-header>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Meninggal</th>
                                        <th scope="col">Sembuh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($dataglobal as $global)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $global['attributes']['Country_Region'] }}</td>
                                            <td>{{ number_format($global['attributes']['Confirmed']) }}</td>
                                            <td>{{ number_format($global['attributes']['Deaths']) }}</td>
                                            <td>{{ number_format($global['attributes']['Recovered']) }}</td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </header>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="{{ asset('assets/assets/mail/jqBootstrapValidation.js') }}"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/assets/js/scripts.js') }}"></script>
</body>

</html>
