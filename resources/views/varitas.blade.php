@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 row">
            <h4 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"> DATA VARITAS</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">DATA VARITAS</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <livewire:varitas.form-varitas>
            <livewire:varitas.table-varitas>
        </div>
    </div>
@endsection
