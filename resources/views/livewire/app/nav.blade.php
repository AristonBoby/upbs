<nav class="main-header navbar navbar-expand-md navbar-light navbar-white bg-light shadow">
    <div class="container">
        <a href="/" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none flex-row">
            <img src="/logo.webp" width="32" height="32 class="me-2" viewBox="0 0 118 94" role="img"><title> BSIP</title></svg> <b class="text-xs"> &nbsp BSIP Kalimantan Timur </b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li><a href="{{ route('welcome') }}" class="nav-link px-2 link-secondary hover">Home</a></li>
                <li><a href="{{ route('layanan') }}" class="nav-link px-2 link-dark hover">Jenis Layanan</a></li>
                @if(Auth::check() == false)
                    <li><a href="{{ route('pendaftaran') }}" class="nav-link px-2 link-dark">Pendaftaran</a></li>
                @endif
                @if(Auth::check() == true)
                <li><a href="{{ route('pengajuanBenih') }}" class="nav-link px-2 link-dark">Pengajuan Benih</a></li>
                <li><a href="{{ route('statusLayanan') }}" class="nav-link px-2 link-dark">Status Layanan</a></li>
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
                            <li><p class="dropdown-item">Data Master Kategori Varitas</p></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item hover" href="{{ route('katVaritas') }}">Kategori Varitas</a></li>
                            <li><a class="dropdown-item" href="{{ route('katvaritasHapus') }}">Kategori Varitas dihapus</a></li>
                        </ul>
                </li>
                @endif
            </ul>
        </div>
        <div class="col-md-2 flex-row-reverse">
            @if(Auth::check() == true)
            <form method="POST" action="{{ route('logout') }}" >
                @csrf
                    <button class="btn btn-outline-danger btn-md float-end" >Logout</button>
            </form>
            @elseif(Auth::check() == false)
            <a href="{{ route('login') }}" class="btn btn-outline-success btn-md float-end" type="submit">Login</a>
            @endif 
        </div>
    </div>
</nav>
<div aria-label="breadcrumb  ">
    <ol class="breadcrumb bg-">
        <li class="breadcrumb-item active text-primary" aria-current="page">Home</li>
    </ol>
</di>