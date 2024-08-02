
<div class="col-md-8">
    <div class="card">
        <div class="card-header bg-primary ">
            <b class="text-white">Table Varitas</b>
        </div>
        <div class="card-body">
            <div class="col-lg-12 mb-5">
                <button wire:click='refresh' class="btn btn-primary btn-sm float-end me-1"><i class="fa fa-reload"></i> Refresh</button>
                <div class="form-group col-md-4 float-end me-2 row ">
                    <label class="form-label col-sm-4"><b>Pencarian</b></label>
                    <div class="col-md-8">
                        <input class="float-end form-control rounded-0 form-control-sm" wire:model.live='search' placeholder="Pencarian Data ...">
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
                <tbody wire:loading>
                    <tr>
                        <td rowspan="5">Mengambil Data ...</td>
                    </tr>
                </tbody>
                <tbody wire:loading.remove class="text-xs">
                    @forelse ( $query as $no=>$data )
                    <tr>
                        <td>{{ $query->firstItem() + $no }}.</td>
                        <td>{{ $data->varitas }}</td>
                        <td>{{ $data->tblKat->kategori }}</td>
                        <td>{{ $data->harga }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" wire:click="editModal('{{ $data->id }}')" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Tidak ditemukan ...</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

            <div class="btn-xs">
                {{ $query->links() }}
            </div>

        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Varitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-sm-start">
                    <form>
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
                                    @forelse ( $kat as $data )
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @empty
                                        <option value="" selected> -- Data Tidak ditemukan</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-md-4">Harga</label>
                            <div class="col-md-8">
                                <input type="text" wire:model='harga' class="form-control form-control-sm rounded-0" placeholder="Harga">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input wire:model.live='status' value="{{ $status }}"class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</div>
