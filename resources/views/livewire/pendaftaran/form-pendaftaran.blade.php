<div class="col-md-9">
        <div class="row justify-content-center">
                <div class="col-md-4" role="document">
                    <div class=" rounded-4 shadow">
                        <form wire:submit="create" method="POST">
                            <div class="container p-3">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model='varNama' class="form-control @error('varNama')is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Nama Lengkap</label>
                                    @error('varNama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model='varEmail' class="form-control  @error('varEmail')is-invalid @enderror" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Email</label>
                                    @error('varEmail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model='varAlamat' class="form-control form-control-sm @error('varAlamat') is-invalid @enderror" id="alamat" placeholder="Alamat ">
                                    <label for="alamat">Alamat</label>
                                    @error('varAlamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model='varHp' class="number form-control @error('varHp') is-invalid @enderror" id="floatingPassword" placeholder="No.Tlpn / HP">
                                    <label for="floatingPassword">No.Tlpn / HP</label>
                                    @error('varHp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select type="text" wire:model='varPekerjaan' class="form-control @error('varPekerjaan') is-invalid @enderror">
                                        <option value="" >-- Pilih Salah Satu --</option>
                                        <option value="3">-- 3 --</option>
                                    </select>
                                    <label for="floatingPassword">Pekerjaan</label>
                                    @error('varPekerjaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" wire:model='varPassword' class="form-control @error('varPassword')is-invalid @enderror " placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                    @error('varPassword')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" wire:model='varrePassword' class="form-control @error('varrePassword') is-invalid @enderror" id="floatingPassword" placeholder="Re-Password">
                                    <label for="floatingPassword">Ulangi Password</label>
                                    @error('varrePassword')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="d-grid gap-1">
                                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>

