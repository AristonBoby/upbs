<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary ">
            <b class="text-white"><i class="fa fa-table"></i> Tabel Varitas</b>
        </div>
        <div class="card-body">
            <div class="form-inline  float-sm-end">
                <div class="col-md-12 row">
                    <div class="col-md-10 col-sm-10 row text-sm-start ">
                        <label class="col-md-5 text-sm-start" for="inlineFormInputGroupUsername2"><b>Pencarian</b></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-sm rounded-0" wire:model.live='pencarian' placeholder="Pencarian...">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 float-end">
                        <button type="submit" wire:click='refresh()' class="btn btn-sm btn-primary rounded-0 mb-2">Refresh</button>
                    </div>
                </div>
            </div>

            <table class="mt-1 table table-sm table-striped table-bordered text-xs fst-normal mb-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Varitas</th>
                        <th>Kategori Varitas</th>
                        <th>Harga</th>
                        <th class="text-center">*</th>
                    </tr>
                </thead>

                <tbody wire:loading.remove>
                    @forelse ( $query as $no=>$data )
                        <tr>
                            <td>{{ $query->firstItem() + $no }}.</td>
                            <td>{{ $data->varitas }}</td>
                            <td>{{ $data->tblKat->kategori }}</td>
                            <td>{{ $data->harga }}</td>
                            <td class="text-center"><button wire:confirm='Apakah Anda Ingin Mengembalikan Data ?' wire:click="restore({{ $data->id }})" class="btn btn-warning btn-sm" href="#"><i class="fa fa-repeat" aria-hidden="true"></i></button></td>
                        </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="5">Data Tidak ditemukan ...</td>
                    </tr>
                    @endforelse
                </tbody>
                <tbody wire:loading>
                    <tr class="text-center">
                        <td colspan="5">Proses Mengambil data ...</td>
                    </tr>
                </tbody>
            </table>

            <div class="btn-xs">

            </div>

        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="mEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Varitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="update">
                    <div class="modal-body text-sm-start">
                        <div class="row">
                            <label class="col-form-label col-md-4">Nama Varitas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control form-control-sm rounded-0" wire:model='varitas' placeholder="Nama Varitas">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-md-4">Kategori Varitas</label>
                            <div class="col-md-8">
                                <select wire:model='kategori' class="form-control form-control-sm rounded-0">
                                        <option value="" selected>-- Pilih Salah Satu --</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-md-4">Harga</label>
                            <div class="col-md-8">
                                <input type="text" wire:model='harga' class="form-control form-control-sm rounded-0 number" placeholder="Harga">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="form-check form-switch">

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

    <!-- Modal Hapus -->
    <div wire:ignore.self class="modal fade" id="mHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Varitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class=" modal-header">
                    <span class="col-md-12">Apakah Anda Ingin Menghapus data Varitas</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm rounded-0" wire:click='hapus'><i class="fa fa-trash-alt"></i> Hapus</button>
                    <button class="btn btn-secondary btn-sm rounded-0"  data-bs-dismiss="modal"> Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus -->

</div>

