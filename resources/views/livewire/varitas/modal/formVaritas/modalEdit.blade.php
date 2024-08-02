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
                            <input type="text" class="form-control form-control-sm rounded-0" placeholder="Nama Varitas">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-form-label col-md-4">Kategori Varitas</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm rounded-0">
                                <option value="" selected>-- Pilih Salah Satu --</option>
                                @foreach ($kat as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                @endforeach
                            </select>
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
