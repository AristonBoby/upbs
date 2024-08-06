<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-7/assets/css/timeline-7.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex h-100">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column " id="app">
        <header>
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container-fluid">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <img src="/logo.webp" width="32" height="32 class="me-2" viewBox="0 0 118 94" role="img"><title> BSIP</title></svg> <b class="text-xs"> &nbsp BSIP Kalimantan Timur </b>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li><a href="{{ route('welcome') }}" class="nav-link px-2 link-secondary hover">Home</a></li>
                            <li><a href="{{ route('layanan') }}" class="nav-link px-2 link-dark hover">Jenis Layanan</a></li>
                            <li><a href="{{ route('pendaftaran') }}" class="nav-link px-2 link-dark">Pendaftaran</a></li>
                            <li><a href="{{ route('pengajuanBenih') }}" class="nav-link px-2 link-dark">Pengajuan Benih</a></li>
                            <li><a href="{{ route('statusLayanan') }}" class="nav-link px-2 link-dark">Status Layanan</a></li>
                            <li><a href="{{ route('varitas') }}" class="nav-link px-2 link-dark">Kategori Varitas</a></li>
                            <li><a href="{{ route('profil') }}" class="nav-link px-2 link-dark">Profil</a></li>
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Master Data
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><p class="dropdown-item">Data Master Varitas</p></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('varitas') }}">Varitas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('varitasHapus') }}">Varitas dihapus</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><p class="dropdown-item">Data Master Varitas</p></li>

                                  </ul>

                            </li>
                        </ul>
                    </div>
                    <form class="d-flex">
                        <a href="{{ route('login') }}" class="btn btn-outline-success btn-md float-end" type="submit">Login</a>
                    </form>
                </div>
            </nav>
        </header>
        <main class="flex-shrink-0">
            <div class="content-wrapper"width="100%" >
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <div class="float-right d-none d-sm-inline">
                Anything you want
                </div>
                <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </div>
        </footer>
    </div>
</body>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $(".number").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
        }
      });
    });

</script>

<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            text: event.detail.text,
            title: event.detail.title,
            icon: event.detail.icon,
            showConfirmButton: false,
            timer: event.detail.timer,
            buttons: false,
        });
    });
</script>
</html>
