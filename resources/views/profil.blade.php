@extends('layouts.app')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h3 class="display-6 fw-normal text-body-emphasis">PROFIL USER</h3>
    </div>
    <main>
        <div class="row justify-content-center">
            <div class="col-md-5" role="document">
                <div class="rounded-4 shadow">
                    <div class="card">
                        <div class="card-body">
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No. Telepon / HP</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="d-grid gap-1">
                               <button class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
