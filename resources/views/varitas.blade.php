@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-1">
            <span class="col-md-4 fw-bold fs-5"> <i class="fa fa-database"></i> DATA VARITAS</span>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="/" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Varitas</li>
                    </ol>
                </nav>
            </div>

        <div class="row mt-3">
            <div class="col-md-12 shadow rounded-3 row p-5">
                <span class="fs-5 fw-bold"> Data Varitas </span>
                <livewire:varitas.form-varitas>
                <livewire:varitas.table-varitas>
            </div>
        </div>
    </div>
@endsection
