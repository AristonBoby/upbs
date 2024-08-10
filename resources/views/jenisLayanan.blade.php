@extends('layouts.app')

@section('content')
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal text-body-emphasis">JENIS VARITAS</h1>
    <p class="fs-5 text-body-secondary"></p>
</div>
    <div class="container">
        <div class="row">
            <livewire:jenis-layanan.jenis-layanan>
        </div>
    </div>
@endsection
