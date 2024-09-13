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
            @include('livewire.app.nav')
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
