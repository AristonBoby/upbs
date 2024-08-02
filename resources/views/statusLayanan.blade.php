@extends('layouts.app')
@section('content')
<div class="container" style="width:100%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Status Pengajuan</span>
                </div>
                <div class="card-body">
                   <table class="table table-sm text-center">
                        <thead>
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">No. Pengajuan</td>
                                <td>Tanggal</td>
                                <td class="text-center">Status</td>
                                <td>Keterangan</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1.</td>
                                <td>0001234</td>
                                <td>23 juli 2024</td>
                                <td class="text-center"><span class="badge rounded-pill bg-warning">Menunggu Konfirmasi</span></td>
                                <td>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="text-primary fa-regular fa-eye"></i></button>
                                        <button type="button" class="btn btn-sm"><i class="text-primary fa-solid fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                   </table>
                </div>
                <tfoot>

                </tfoot>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-eye text-sm"></i> DETAIL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
                <label class="col-sm-1 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <label class="col-sm-10 col-form-label">Ariston Boby Willy Munte</label>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-1 col-md-1 col-form-label">Email</label>
                <label class="col-sm-10 col-md-10 col-form-label">aristonbobi@gmail.com</label>
            </div>
            <div class="row">
                <label class="col-sm-1 col-md-1 col-form-label">Alamat</label>
                <label class="col-sm-10 col-md-10 col-form-label">aristonbobi@gmail.com</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection
