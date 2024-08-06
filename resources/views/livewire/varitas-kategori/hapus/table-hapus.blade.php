<div class="col-md-12">
    <div class="card col-md-12">
        <div class="card-header bg-danger">
            <b class="text-white"><i class="fa fa-table"></i> Table Riwayat Data Kategori Varitas di Hapus</b>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="form-inline mb-3 float-sm-end">
                    <div class="col-md-12 row">
                        <div class="col-md-10 col-sm-10 row text-sm-start ">
                            <label class="col-md-5 text-sm-start" for="inlineFormInputGroupUsername2"><b>Pencarian</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control form-control-sm rounded-0" wire:model.live='pencarian' placeholder="Pencarian...">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 float-end">
                            <button type="submit" wire:click='refreshTable' class="btn btn-sm btn-primary rounded-0 mb-2">Refresh</button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="mt-1 table table-sm table-hover table-striped table-bordered text-xs fst-normal mb-3">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Kategori</th>
                        <th width='200'>Tanggal di hapus</th>
                        <th width="60" class="text-center">*</th>
                    </tr>
                </thead>
                <tbody wire:loading>
                    <tr>
                        <td colspan="4" class="text-center">Loading...</td>
                    </tr>
                </tbody>
                <tbody wire:loading.remove>
                    @forelse ( $query as $no=>$data )
                        <tr>
                            <td width="10">{{ $query->firstItem() + $no }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->deleted_at }}</td>
                            <td width="100" class="text-center">
                                <a href='#' class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus" wire:click='idRestore({{ $data->id }})'><i class="fa fa-repeat"></i></a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan=4> Data tidak ditemukan</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="btn-sm">
                {{ $query->links() }}
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="col-form-label"><i class="fa fa-trash"></i> <b>Hapus Data Kategori Varitas</b></label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class=" modal-header">
                    <span class="col-md-12">Apakah Anda Ingin mengembalikan Kategori ?</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-sm rounded-0" wire:click='restoreVaritas'> Kembalikan</button>
                    <button class="btn btn-secondary btn-sm rounded-0"  data-bs-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
 $(document).ready(function(){
    window.addEventListener('alertVaritas', event => {
        $("#modalHapus").modal("hide");
        Swal.fire({
            text: event.detail.text,
            title: event.detail.title,
            icon: event.detail.icon,
            showConfirmButton: false,
            timer: event.detail.timer,
            buttons: false,
        });
    });

 });
</script>
