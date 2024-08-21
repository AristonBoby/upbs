    <div class='col-md-12'>
        <div class="row justify-content-center">
            <div class="col-md-12" role="document">
                <div class=" rounded-4 shadow">
                    <form action="#" wire:submit='simpan'>
                        <div class="p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div  class="card shadow mb-3 ">
                                        <div class="card-header text-white bg-primary">
                                            <label class="card-title"><b>DATA PEMOHON</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" wire:model='valNama' id="floatingInput" value="dd" placeholder="name@example.com" disabled>
                                                <label for="floatingInput">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" wire:model='valAlamat' class="form-control form-control-sm" id="floatingPassword" placeholder="Password" disabled>
                                                <label for="floatingPassword">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="noHp" class="form-control" id="floatingPassword" wire:model='valnoTlpn' placeholder="Password"disabled>
                                                <label for="floatingPassword" >No.Tlpn / HP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="pekerjaan" class="form-control" id="floatingPassword" wire:model='valPekerjaan' placeholder="Password"disabled>
                                                <label for="floatingPassword">Pekerjaan</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div  class="card mb-3 shadow ">
                                        <div class="card-header text-white bg-primary">
                                            <label class="card-title"><b>JENIS PERMOHONAN</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-floating mb-3">
                                                <select type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                    <option>-- Pilih Salah Satu --</option>
                                                    <option>Membeli Bibit/Benih</option>
                                                    <option>Bahan Diseminisasi</option>
                                                </select>
                                                <label for="floatingPassword">Jenis</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" placeholder="dd/MM/YYYY">
                                                <label>Rencana Tanggal Pengambilan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 shadow ">
                                        <div class="card-header bg-primary text-white">
                                            <label class="card-title"><b>LOKASI TANAM BIBIT</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <b class="col-md-3">Provinsi</b>
                                                <select wire:model.live='varprovinsi' class="form-control">
                                                    <option selected value="">-- Pilih Salah Satu --</option>
                                                    @forelse ( $provinsi as $data )
                                                        <option value="{{ $data->id }}">{{ $data->provinsi }}</option>
                                                    @empty
                                                    <option selected value="">-- Data Tidak ditemukan --</option>
                                                    @endforelse

                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <b class="col-md-3">Kota/Kab</b>
                                                    <select wire:model.live='varKota' class="form-control">
                                                        <option selected>-- Pilih Salah Satu --</option>
                                                        @forelse ( $kota as $data )
                                                            <option value="{{ $data->id }}">{{ $data->kota }}</option>
                                                        @empty
                                                            <option selected value="">-- Data Tidak ditemukan --</option>
                                                        @endforelse
                                                    </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <b class="col-md-3">Kecamatan</b>
                                                <select wire:model.live='varKecamatan' class="form-control">
                                                    <option selected>-- Pilih Salah Satu --</option>
                                                    @forelse ( $kecamatan as $data )
                                                        <option value="{{ $data->id }}">{{ $data->kecamatan }}</option>
                                                    @empty
                                                        <option selected value="">-- Data Tidak ditemukan --</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <b class="col-md-3">Kelurahan/Desa</b>
                                                <select wire:model.live='varKelurahan' class="form-control">
                                                    <option selected>-- Pilih Salah Satu --</option>
                                                    @forelse ( $kelurahan as $data )
                                                        <option value="{{ $data->id }}">{{ $data->kelurahan }}</option>
                                                    @empty
                                                        <option>-- Data Tidak ditemukan --</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary mb-3 shadow">
                                <div class="card-header bg-success text-white">
                                    <b class="card-title">Varitas</b >
                                </div>
                                <div class="cord-body p-3">
                                    <button type="button" class="btn btn-sm btn-primary mb-3" wire:click='add()'>+ Tambah Varitas</button>
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <th>Jenis Varitas</th>
                                            <th width="100">Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                            <th class="text-center">*</th>
                                            <th class="text-center"></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($varitas as $no=>$item)
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('idVaritas.'.$no) is-invalid @enderror"" wire:model='idVaritas.{{ $no }}' disabled>
                                                            <option value="" selected>-- Pilih Salah Satu --</option>
                                                            @foreach($jenis as $data)
                                                                <option value={{$data->id}}>{{ $data->varitas }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control @error('jumlah.'.$no) is-invalid @enderror" wire:model='jumlah.{{ $no }}' disabled>
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model='harga.{{$no}}' class="form-control @error('harga.'.$no) is-invalid @enderror" disabled>
                                                    <td>
                                                        <input type="text" wire:model='total.{{ $no }}' class="form-control @error('total.'.$no) is-invalid @enderror" disabled>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($no === 0)
                                                            
                                                        @else
                                                            <button type="button" class="btn btn-sm btn-danger" wire:click='remove({{ $no }})'><i class="fa fa-trash"></i></button>
                                                        @endif
                                                        
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-primary" wire:click='varitasView({{ $no}})' data-bs-toggle="modal" data-bs-target="#modalVaritas">...</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-grid gap-1">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div wire:ignore.self class="modal fade" id="modalVaritas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-edit text-sm"></i> Data Varitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit="simpanVaritas">
                        <div class="modal-body text-sm-start">
                            <div class="row">
                                <label class="col-form-label col-md-4">Varitas</label>
                                <div class="col-md-8">
                                    <select wire:model='modalVaritas' class="form-control form-control-sm rounded-0">
                                            <option value="" selected>-- Pilih Salah Satu --</option>
                                            @foreach ( $jenis as $data )
                                                <option value="{{ $data->id }}">{{ $data->varitas }} </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-form-label col-md-4">Jumlah</label>
                                <div class="col-md-8">
                                    <input type="text" wire:model='modalJumlah' class="form-control form-control-sm rounded-0 number" placeholder="Jumlah">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="simpan" type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
