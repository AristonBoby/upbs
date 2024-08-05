
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
                <tbody wire:loading wire:target='refresh'>
                    <tr>
                        <td rowspan="5">Mengambil Data ...</td>
                    </tr>
                </tbody>
                <tbody wire:loading.remove wire:target='search' class="text-xs">
                    @forelse ( $query as $no=>$data )
                    <tr>
                        <td>{{ $query->firstItem() + $no }}.</td>
                        <td>{{ $data->varitas }}</td>
                        <td>{{ $data->tblKat->kategori }}</td>
                        <td>{{ $data->harga }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" wire:click="editModal('{{ $data->id }}')" data-bs-toggle="modal" data-bs-target="#mEdit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" wire:click="editModal('{{ $data->id }}')" data-bs-toggle="modal" data-bs-target="#mHapus">
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
                                <input type="text" wire:model='harga' class="form-control form-control-sm rounded-0 number" placeholder="Harga">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input wire:model='status' value="{{ $status }}" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" @if($status=='1' || $status===1) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">@if($status=='1' || $status===1) Aktif @endif @if($status=='0') Tidak Aktif @endif</label>
                                </div>
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
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
         window.addEventListener('alertEdit', event => {
            $("#mEdit").modal("hide");
                Swal.fire({
                text: event.detail.text,
                title: event.detail.title,
                icon: event.detail.icon,
                showConfirmButton: true,
                timer: event.detail.timer,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#3085d6',
                buttons: false,
            });
         });
    });
</script>
