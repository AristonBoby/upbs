
<div class="col-md-8">
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
                            <input type="text" class="form-control form-control-sm rounded-0" wire:model.live='search' placeholder="Pencarian...">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 float-end">
                        <button type="submit" wire:click='refresh' class="btn btn-sm btn-primary rounded-0 mb-2">Refresh</button>
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
                        <th>Status</th>
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
                        <td>
                            @if ($data->status ===1)
                                <span class="badge bg-success">Aktif</span>
                            @elseif ($data->status ===0)
                                <span class="badge bg-warning text-dark">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" wire:click="editModal('{{ $data->id }}')" data-bs-toggle="modal" data-bs-target="#mEdit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <a href="javascript:void(0)" data-bs-toggle="modal" wire:click="editModal('{{ $data->id }}')" data-bs-target="#mHapus" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#mHapus">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan ...</td>
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
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-edit text-sm"></i> Edit Varitas</h5>
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
               // confirmButtonText: 'Hapus',
                confirmButtonColor: '#3085d6',
                buttons: false,
            });
         });
         window.addEventListener('alertDelete', event => {
            $("#mHapus").modal("hide");
                Swal.fire({
                text: event.detail.text,
                title: event.detail.title,
                icon: event.detail.icon,
                showConfirmButton: true,
                timer: event.detail.timer,
                //confirmButtonText: 'Hapus',
                confirmButtonColor: '#3085d6',
                buttons: false,
            });
         });
    });
</script>

