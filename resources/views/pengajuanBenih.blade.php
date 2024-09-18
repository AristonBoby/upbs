@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row p-2">
            <span class="col-md-4 fw-bold fs-5"> <i class="fa fa-users" aria-hidden="true"></i> PROFIL</span>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="/" class="text-muted"><i class="fa fa-home "></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <livewire:pengajuan-benih.pengajuan>
    </div>
@endsection
