@extends('layouts.app')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h3 class="display-6 fw-normal text-body-emphasis">PROFIL USER</h3>
    </div>
    <main>
        <livewire:profil.user-profil>
    </main>
@endsection
@section('nav')
<li class="breadcrumb-item"><a href="#">Login</a></li>
<li class="breadcrumb-item active" aria-current="page">Profil</li>
@endsection