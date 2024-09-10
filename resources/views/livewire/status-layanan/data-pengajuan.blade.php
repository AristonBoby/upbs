<div class="container" style="width:100%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Status Pengajuan</span>
                </div>
                <div class="card-body">
                   <table class="table table-sm text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">Nama</td>
                                <td>Tanggal Pengambilan</td>
                                <td>Harga</td>
                                <td class="text-center">Status</td>
                                <td>Keterangan</td>
                                <td>Tanggal Pendaftaran</td>
                                <td>*</td>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-6 row">
                                    <div class="input-group col-md-3 mb-3">
                                        <input wire:model.live='pencarian' type="text" class="form-control rounded-0" placeholder="Pencarian Data ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary rounded-0" type="button">Pencarian</button>
                                            <a class="btn btn-outline-danger rounded-0" href='/statusLayanan' type="button">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @forelse ( $datapengajuan as $no=>$data)
                                <tr>
                                    <td>{{ $no+1 }}.</td>
                                    <td>{{ $data->user->name }}</td>   
                                    <td>{{ $data->tglPengambilan }}</td>
                                    <td>{{ $data->harga }}</td>
                                    <td>{{ $data->jenispembayaran_id }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <a href="javascript:void(0)" wire:click='findId("{{$data->id}}")' data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"> <i class=" fa fa-eye"></i></a>
                                        <button class=" btn btn-sm bg-default text-secondary"><i class="fa fa-print"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Data Tidak ditemuka</td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                   </table>
                   {{ $datapengajuan->links() }}
                </div>
                <tfoot>

                </tfoot>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalDetailTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetailTransaksi" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @foreach ( $dataModal as $data)
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-eye text-sm"></i> Detai Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <span class="badge float-end  text-bg-secondary">Secondary</span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <h4 class="text-center mb-3">DETAIL TRANSAKSI </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <span class="fw-bold col-sm-4">Nama</span>
                                        <div class="col-md-7 text-capitalize">
                                            <span class="fw-bold">: {{ $data->user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row fw-bolder">
                                        <span class="fw-bold col-sm-4">Email</span>
                                        <div class="col-md-7">
                                            <span class="fw-bold">: {{ $data->user->email }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row fw-bolder">
                                        <span class="fw-bold col-sm-4">Pekerjaan</span>
                                        <div class="col-md-7">
                                            <span class="fw-bold">: {{ $data->user->pekerjaan }}</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row fw-bolder">
                                        <span class="fw-bold col-sm-4">No Tlpn / HP</span>
                                        <div class="col-md-7">
                                            <span>: {{ $data->user->noTlpn }}</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row fw-bolder">
                                        <span class="fw-bold col-sm-4">Alamat</span>
                                        <div class="col-md-7">
                                            <span>: {{ $data->user->alamat }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup</button>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
</div>