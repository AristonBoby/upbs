<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary">
            <b class="text-white">Form Varitas</b>
        </div>
        <div class="card-body">
            <form wire:submit="create" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" wire:model='varVaritas' class="form-control form-control @error('varVaritas')is-invalid @enderror" id="floatingInput">
                    <label for="floatingInput">Nama Varitas</label>
                    @error('varVaritas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model='varHarga' class="form-control @error('varHarga')is-invalid @enderror" id="floatingInput">
                    <label for="floatingInput">Harga</label>
                    @error('varHarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-floating mb-3">
                    <select wire:model='varKategori' class="form-control @error('varKategori')is-invalid @enderror">
                        <option value="">-- Pilih Salah Satu --</option>
                        @forelse ( $kategori as $data )
                            <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                        @empty
                        <option value="" class="text-danger @error('varKategori') is-invalid @enderror" disabled><i>-- Error Data Tidak ditemukan --</i></option>
                        @endforelse
                    </select>
                    <label for="floatingInput">Kategori</label>
                    @error('varKategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-floating mb-3">
                    <select wire:model='varStatus' class="form-control @error('varStatus')is-invalid @enderror">
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                    <label for="floatingInput">Status</label>
                    @error('varStatus')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                    <button class="btn btn-danger btn-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

