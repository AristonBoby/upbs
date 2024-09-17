<div class="row justify-content-center">
    <span class="fs-4 fw-bold m-3 text-center"><i class="fa fa-edit"> </i> UPDATE PROFIL</span>
    <div class="col-md-12" role="document">
        <div class="rounded-5 shadow">
            <div class="card">
                <div class="card-header bg-default">
                    <span class="card-title">Form Profil</span>
                </div>
                <form wire:submit='update'>
                    <div class="card-body">
                        <div class="row">
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
                            <div class=" mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" wire:model='alamat' id="exampleFormControlInput1" >
                            </div>
                            <div class="">
                                <button class="btn btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-center">Ganti Password
                            <a href="{{ route('passwordUpdate') }}">
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

                </div>
            </div>
        </div>
    </div>
</div>
