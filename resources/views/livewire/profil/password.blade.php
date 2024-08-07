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
                        <input type="text" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-form-label col-md-4">Password Baru <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-form-label col-md-4">Re-Password Baru <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" data-bs-dismiss="modal" class="col-md-2 float-end mx-1 btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                </div>
                <div class="mt-3">
                    <button type="submit" class="col-md-2 float-end btn btn-sm btn-primary" ><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
