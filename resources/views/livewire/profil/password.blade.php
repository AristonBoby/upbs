<div class="row justify-content-center mb-3 ">
    <div class="col-md-4">
    <div class="card ">
        <div class="card-header bg-info">
            <i class="fa fa-key"></i> <b class="">Form Ganti Password</b>
        </div>
        <div class="card-body">
            <form wire:submit='passwordUpdate'>
                <div class="form-group row mb-2">
                    <label class="col-form-label col-md-4">Password Lama <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" wire:model='passLama' class="form-control form-control-sm rounded-0 @error('passLama') is-invalid @enderror">
                        @error('passLama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-form-label col-md-4">Password Baru <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" wire:model='valpassBaru' class="form-control form-control-sm rounded-0 @error('valpassBaru') is-invalid @enderror">
                        @error('valpassBaru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-form-label col-md-4" >Re-Password Baru <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" wire:model='repassBaru' class="form-control form-control-sm rounded-0 @error('valrepassBaru') is-invalid @enderror">
                        @error('valrepassBaru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" data-bs-dismiss="modal" class="col-md-2 float-end mx-1 btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                </div>
                <div class="mt-3">
                    <button type="submit" class="col-md-2 float-end btn btn-sm btn-primary" ><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
