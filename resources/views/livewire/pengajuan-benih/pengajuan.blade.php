<div>
    <main class='col-md-12'>
        <div class="row justify-content-center">
            <div class="col-md-12" role="document">
                <div class=" rounded-4 shadow">
                    <form action="#" method="POST">
                        <div class="p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div  class="card mb-3 ">
                                        <div class="card-header text-white bg-primary">
                                            <label class="card-title"><b>DATA PEMOHON</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control " id="floatingInput" value="dd" placeholder="name@example.com" disabled>
                                                <label for="floatingInput">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control form-control-sm" id="floatingPassword" placeholder="Password" disabled>
                                                <label for="floatingPassword">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="noHp" class="form-control" id="floatingPassword" placeholder="Password"disabled>
                                                <label for="floatingPassword">No.Tlpn / HP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="pekerjaan" class="form-control" id="floatingPassword" placeholder="Password"disabled>
                                                <label for="floatingPassword">Pekerjaan</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div  class="card mb-3">
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
                                    <div class="card mb-3">
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
                            <div class="card card-primary mb-3">
                                <div class="card-header bg-success text-white">
                                    <b class="card-title">Varitas</b >
                                </div>
                                <div class="cord-body p-3">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <th width="5">No.</th>
                                            <th>Jenis Varitas</th>
                                            <th width="100">Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                            <th class="text-center">*</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><select class="form-control">
                                                        <option>-- Pilih Salah Satu --</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-primary">+</button>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="d-grid gap-1">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
