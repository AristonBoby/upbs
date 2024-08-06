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
