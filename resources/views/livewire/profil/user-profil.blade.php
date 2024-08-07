<div class="row justify-content-center mb-3">
    <div class="col-md-5" role="document">
        <div class="rounded-4 shadow">
            <div class="card">
                <form wire:submit='update'>
                    <div class="card-body">
                        <div class=" mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            <input type="text" wire:model='name' class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                        </div>
                        <div class=" mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" id="exampleFormControlInput1" disabled>
                        </div>
                        <div class=" mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
                            <input type="text" wire:model='pekerjaan' class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class=" mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No. Telepon / HP</label>
                            <input type="text" wire:model='noTlpn'class="form-control" id="exampleFormControlInput1" >
                        </div>
                        <div class=" mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" wire:model='alamat' id="exampleFormControlInput1" >
                        </div>
                        <div class="d-grid gap-1">
                        <button class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-center">Ganti Password
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updatePassword"  data-bs-toggle="modal" data-bs-target="#mHapus">
                                Klik disini
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="updatePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel"><i class="fa fa-key text-sm"></i> <b>Ganti</b> Password</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
