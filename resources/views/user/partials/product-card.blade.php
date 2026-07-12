<div class="product-card h-100">
    <div class="img-wrap">
        @if($product->gambar)
            <img src="{{ asset('images/' . $product->gambar) }}"
                 alt="{{ $product->nama }}"
                 loading="lazy">
        @else
            <i class="bi bi-image text-secondary" style="font-size:3rem;"></i>
        @endif
    </div>
    <div class="card-body">
        <div class="product-name">{{ $product->nama }}</div>
        <div class="product-price mt-1">
            Rp {{ number_format($product->harga, 0, ',', '.') }}
        </div>
        <a href="{{ route('user.product.show', [$category, $product->id]) }}"
           class="btn-detail">
            Lihat Detail
        </a>
    </div>
</div>