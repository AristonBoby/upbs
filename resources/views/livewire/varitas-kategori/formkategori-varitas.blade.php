<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-success">
            <b class="text-white"><i class="fa fa-edit"></i> Form Kategori Data Varitas</b>
        </div>
        <div class="card-body">
            <form wire:submit='simpan'>
                <div class="form-group row">
                    <label class="form-label col-md-3"><b>Data Kategori <span class="text-danger">*</span></b> </label>
                    <div class="col-md-9">
                        <input wire:model='varKategori' type="text" class="form-control form-control-sm @error('varKategori') is-invalid @enderror" wire:model='varKategori' placeholder="Data kategori">
                        @error('varKategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-md-3"><b>Status <span class="text-danger">*</span></b></label>
                    <div class="col-md-9">
                        <div class="form-check form-switch">
                            <input wire:model='varStatus' class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class=" float-end btn-sm btn btn-secondary mx-1">Batal</button>
                    <button class=" float-end btn-sm btn btn-primary ">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
