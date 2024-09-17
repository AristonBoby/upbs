@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row m-1">
            <span class="col-md-4 fw-bold fs-5"> <i class="fa fa-trash-o" aria-hidden="true"></i> RIWAYAT DATA VARITAS</span>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item "><a href="/" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Data Varitas</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-md-12 shadow p-5 mt-5 mb-4 rounded-5">
            <livewire:varitas.hapus.varitas-hapus>
        </div>
    </div>
@endsection
