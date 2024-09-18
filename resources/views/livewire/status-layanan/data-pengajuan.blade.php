<div class="container" style="width:100%">
    <div class="col-md-12 shadow p-3 mb-5 rounded-4">
        <span class="fw-bold fs-5 p-3"> <i class="fa fa-table"></i> Status Pengajuan</span>
    <div class="row justify-content-center">
        <div class="col-md-11 m-5">
            <div class="card shadow">
                <div class="card-header">
                    <span class="card-title">Table Pengajuan</span>
                </div>
                <div class="card-body">
                   <table class="table table-sm table-bordered text-center table-striped table-hover">
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
                                    <div class="col-md-4 offset-md-8 row">
                                        <div class="input-group col-md-3 mb-3">
                                            <input wire:model.live='pencarian' type="text" class="form-control " placeholder="Pencarian Data ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary rounded-0" type="button">Pencarian</button>
                                                <a class="btn btn-outline-danger rounded-0" href='/statusLayanan' type="button">Reset</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @forelse ( $datapengajuan as $no=>$data)
                                    <tr>
                                        <td>{{ $datapengajuan->firstItem() + $no }}.</td>
                                        <td>{{ $data->user->name }}</td>   
                                        <td>{{  \Carbon\Carbon::parse($data->tglPengambilan)->format('d F Y')  }}</td>
                                        <td> @rupiah($data->harga )</td>
                                        <td>
                                            @if ($data->status === '1')
                                                <span class="badge badge-primary bg-warning">Menunggu Konfirmasi</span>
                                            @elseif ($data->status === '0')
                                                <span class="badge badge-primary bg-success">Disetujui</span>
                                            @elseif ($data->status === '2')
                                                <span class="badge badge-primary bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->jenispembayaran_id }}</td>
                                        <td>{{  \Carbon\Carbon::parse($data->created_at)->format('d F Y H:i:s')  }}</td>
                                        <td>
                                            <a href="javascript:void(0)" wire:click='findId("{{$data->id}}")' data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"> <i class="fa-sm fa fa-eye"></i></a>
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
            </div>
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
                                    @if($data->status === '1')
                                        <b class="badge float-end  text-bg-warning">Menunggu Konfirmasi</b>
                                    @elseif($data->status === '0')
                                        <b class="badge float-end  text-bg-success">Disetujui</b>
                                    @elseif($data->status === '2')
                                        <b class="badge float-end  text-bg-danger">Ditolak</b>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-3">
                                    <h6 class="text-center mb-3"><u>DETAIL IDENTITAS</u> </h6>
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
                                <hr class="mt-1">
                                <div class="col-md-12 mb-3">
                                    <h6 class="text-center mb-1"><u>DETAIL PEMESANAN</u> </h6>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="row">
                                       <div class="col-md-6 row">
                                            <label class="fw-bold col-md-4">Tanggal Pengambilan </label>
                                            <p class="col-sm-8 text-capitalize"> : {{  \Carbon\Carbon::parse($data->tglPengambilan)->format('d F Y')  }}</p>
                                       </div>
                                       <div class="col-md-6 row">
                                            <label class="fw-bold col-md-4">Lokasi Penanaman </label>
                                            <p class="col-sm-8 text-capitalize">    
                                                Kelurahan/Desa {{$data->kelurahan->kelurahan}} 
                                                Kecamatan {{ $data->kelurahan->kecamatan->kecamatan }} 
                                                Kab/Kota {{ $data->kelurahan->kecamatan->kota->kota }} 
                                                Provinsi {{ $data->kelurahan->kecamatan->kota->provinsi->provinsi}}
                                            </p>
                                       </div>
                                    </div>
                                </div>
                                <hr class="mt-1">
                                <div class="col-md-12 mb-3">
                                    <h6 class="text-center mb-1"><u>DETAIL PEMESANAN VARITAS</u> </h6>
                                </div>
                                <table class="table table-striped table-bordered table-sm mt-3">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenis Varitas</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $data->itemvaritas as $no=>$query)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{$query->relasitblvaritas->varitas}}</td>
                                                <td>@rupiah($query->relasitblvaritas->harga)</td>
                                                <td>{{$query->jumlah}}</td>
                                                <td><b>@rupiah($query->total)</b></td>
                                            </tr>    
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Varitas tidak ada ...</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="float-end">Total Harga : @rupiah($data->harga)</h5>
                            </div>
                        </div>
                    <div class="modal-footer">
                        @if($data->status === '0')
                            <button type="button" class="btn btn-info btn-sm float-start text-white"><i class='fa fa-print'></i> Cetak</button>
                        @endif
                        @if($data->status === '1')
                            <button type="button" class="btn btn-success btn-sm float-start" data-bs-toggle="modal" data-bs-target="#konfirmasiModal"><i class='fa fa-check'></i> Konfirmasi</button>
                        @elseif($data->status === '0')
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#btlkonfirmasiModal"> <i class="fa fa-times" ></i> Batalkan Permintaan</button>
                        @endif
                        @if($data->status ==='1')
                            <button type="button" class="btn btn-danger btn-sm float-start" data-bs-toggle="modal" data-bs-target="#hapusModal" wire:click='findId({{ $data->id }})'><i class='fa fa-trash'></i> Hapus Permintaan</button>
                        @endif
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class='fa fa-times'></i> Tutup</button>
                    </div>
                @endforeach
            </div>
        </div>
      </div>


      <div wire:ignore.self class="modal fade" id="konfirmasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="konfirmasiModal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-question-circle text-sm"></i> Konfirmasi</h5>
                </div>
                <div class="modal-body">
                   <span>
                        Apakah Anda Ingin Menerima Permintaan Varitas Bibit?
                   </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-sm " wire:click='konfirmasiPengajuan'>Konfirmasi</button>
                    <button class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>

                </div>
            </div>
        </div>
      </div>

      <div wire:ignore.self class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusModal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-question-circle text-sm"></i> Konfirmasi</h5>
                </div>
                <div class="modal-body">
                   <span>
                      Apakah Anda Ingin Menghapus Permintaan ini ?
                   </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" data-bs-dismiss="modal" wire:click='hapus'><i class="fa fa-trash" > </i> Hapus</button>
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" ><i class="fa fa-times"></i> Batal</button>

                </div>
            </div>
            </div>
      </div>

        <div wire:ignore.self class="modal fade" id="btlkonfirmasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="btlkonfirmasiModal" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-question-circle text-sm"></i> Konfirmasi</h5>
                    </div>
                    <div class="modal-body">
                    <span>
                        Apakah Anda Ingin Membatalkan Permintaan ini ?
                    </span>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger btn-sm" wire:click='btlKonfirmasi' ><i class="fa fa-trash"> </i> Batalkan Konfirmasi</button>
                        <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" ><i class="fa fa-times"></i> Batal</button>

                    </div>
                </div>
            </div>
        </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        window.addEventListener('alert', event => {
            $("#konfirmasiModal").modal("hide");
            $("#btlkonfirmasiModal").modal("hide");

        });
    });
</script>