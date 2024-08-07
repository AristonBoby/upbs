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
