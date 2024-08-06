<div class="col-md-8">
    <div class="card">
        <div class="card-header bg-success">
            <b class="text-white"><i class="fa fa-table"></i> Table Kategori Data Varitas</b>
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
                        <button type="submit" wire:click='refresh' class="btn btn-sm btn-primary rounded-0 mb-2">Refresh</button>
                    </div>
                </div>
            </div>
            <table class="mt-1 table table-sm table-striped table-hover table-bordered text-xs fst-normal mb-">
                <thead>
                    <tr>
                        <th width=13>No.</th>
                        <th>Kategori</th>
                        <th width=20 class="text-center">Status</th>
                        <th width=100 class="text-center">*</th>
                    </tr>
                </thead>
                <tr wire:loading>
                    <td rowspan="4">Loading ...</td>
                </tr>
                <tbody wire:loading.remove>
                    @forelse ( $query as $no=>$data )
                        <tr>
                            <td>{{ $query->firstItem() + $no }}. </td>
                            <td>{{ $data->kategori }}</td>
                            <td>
                                @if ($data->status == 1)
                                    <span class="badge rounded-pill text-bg-success">Aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#katHapus" wire:click='hapusId("{{ $data->id }}")' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#mHapus">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{ $query->links() }}
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="katHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="col-form-label"><i class="fa fa-trash"></i> <b>Hapus Data Kategori Varitas</b></label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class=" modal-header">
                    <span class="col-md-12">Apakah Anda Ingin Menghapus data Kategori Varitas ?</span>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm rounded-0" wire:click='hapus'><i class="fa fa-trash-alt"></i> Hapus</button>
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
        $("#katHapus").modal("hide");
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

