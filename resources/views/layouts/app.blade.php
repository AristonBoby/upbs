<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body>
    <div class="container" id="app">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/logo.webp" width="32" height="32 class="me-2" viewBox="0 0 118 94" role="img"><title>BSIP</title></svg> <b class="text-xs"> BSIP Kalimantan Timur </b>
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{ route('welcome') }}" class="nav-link px-2 link-secondary">Home</a></li>
              <li><a href="{{ route('layanan') }}" class="nav-link px-2 link-dark">Jenis Layanan</a></li>
              <li><a href="{{ route('pendaftaran') }}" class="nav-link px-2 link-dark">Pendaftaran</a></li>
              <li><a href="{{ route('pengajuanBenih') }}" class="nav-link px-2 link-dark">Pengajuan Benih</a></li>
              <li><a href="{{ route('statusLayanan') }}" class="nav-link px-2 link-dark">Status Layanan</a></li>
              <li><a href="{{ route('varitas') }}" class="nav-link px-2 link-dark">Varitas</a></li>
              <li><a href="{{ route('profil') }}" class="nav-link px-2 link-dark">Profil</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Tentang</a></li>
            </ul>
            <div class="col-md-3 text-end">
                @if(Auth()->check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"type="button" class="btn btn-outline-primary me-2">Login</a>
                @endif
            </div>
        </header>
            <nav aria-label="breadcrumb">
                @yield('breadcrumb')
            </nav>
            @yield('content')

            <footer class="py-3 my-4">
                <p class="text-center text-body-secondary">©UPBS BSIP KALTIM 2024</p>
            </footer>
        </div>
    </div>
</body>
</html>
