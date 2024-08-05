<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary">
            <b class="text-white">Form Varitas</b>
        </div>
        <div class="card-body">
            <form wire:submit="create" method="POST">
                <div class="form-group row mb-2">
                    <label for="floatingInput" class="form-control-label col-md-4">Nama Varitas</label>
                    <div class="col-md-8">
                        <input type="text" wire:model='varVaritas' class="form-control form-control rounded-0 @error('varVaritas')is-invalid @enderror" id="floatingInput" placeholder="Masukan Nama Varitas">
                        @error('varVaritas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="floatingInput" class="form-control-label col-md-4">Harga</label>
                    <div class="col-md-8">
                        <input type="text" wire:model='varHarga' class="form-control rounded-0 @error('varHarga')is-invalid @enderror" placeholder="Masukan Harga" id="floatingInput">
                        @error('varHarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="floatingInput" class="form-control-label col-md-4">Kategori</label>
                    <div class="col-md-8">
                        <select wire:model='varKategori' class="form-control rounded-0 @error('varKategori')is-invalid @enderror">
                            <option value="">-- Pilih Salah Satu --</option>
                            @forelse ( $kategori as $data )
                                <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                            @empty
                            <option value="" class="text-danger @error('varKategori') is-invalid @enderror" disabled><i>-- Error Data Tidak ditemukan --</i></option>
                            @endforelse
                        </select>
                        @error('varKategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="floatingInput" class="form-control-sm col-md-4">Status</label>
                    <div class="col-md-8">
                        <select wire:model='varStatus' class="form-control rounded-0 @error('varStatus')is-invalid @enderror">
                            <option value="" selected>-- Pilih Salah Satu --</option>
                            <option value="0">Aktif</option>
                            <option value="1">Tidak Aktif</option>
                        </select>
                        @error('varStatus')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

