<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary">
            <b class="text-white"><i class="fa fa-edit"></i> Form Varitas</b>
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
                        <select wire:model='varKategori' class="form-select form-control rounded-0 @error('varKategori')is-invalid @enderror">
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
                        <select wire:model='varStatus' class="form-select form-control rounded-0 @error('varStatus')is-invalid @enderror">
                            <option value="" selected>-- Pilih Salah Satu --</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
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
        <div wire:ignore.self class="modal fade" id="mEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-edit text-sm"></i> Edit Varitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="update">
                    <div class="modal-body text-sm-start">
                        <div class="row">
                            <label class="col-form-label col-md-4">Nama Varitas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control form-control-sm rounded-0" wire:model='varitas' placeholder="Nama Varitas">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-md-4">Kategori Varitas</label>
                            <div class="col-md-8">
                                <select wire:model='kategori' class="form-control form-control-sm rounded-0">
                                        <option value="" selected>-- Pilih Salah Satu --</option>
                                    @forelse ( $kat as $data )
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @empty
                                        <option value="" selected> -- Data Tidak ditemukan</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-md-4">Harga</label>
                            <div class="col-md-8">
                                <input type="text" wire:model='harga' class="form-control form-control-sm rounded-0 number" placeholder="Harga">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input wire:model='status' value="{{ $status }}" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" @if($status=='1') checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">@if($status=='1' || $status===1) Aktif @endif @if($status=='0') Tidak Aktif @endif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="simpan" type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

