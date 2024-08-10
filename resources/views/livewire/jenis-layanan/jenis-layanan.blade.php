<div class="row">
    @forelse($query as $value)
        <div class="col-md-3 mb-3">
            <div class="card border-primary rounded-2 shadow-sm">
                <div class="card-header border-primary">
                    <h3 class="card-title pricing-card-title">{{ $value->varitas }}<small class="text-body-secondary fw-light"> / {{ $value->tblkat->kategori }}</small></h3>
                </div>
                <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><b> Harga {{ $value->harga }} </b></li>
                            <li><b> Jumlah Stok 0 </b></li>
                        </ul>

                </div>
            </div>
        </div>

    @empty

    @endforelse
</div>
