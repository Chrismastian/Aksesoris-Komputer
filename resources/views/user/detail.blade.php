@extends('layouts.user')

@section('title', $product->nama . ' - TechZone')

@section('content')

@php
$icons = [
    'keyboard' => 'bi-keyboard',
    'mouse'    => 'bi-mouse',
    'headset'  => 'bi-headset',
    'monitor'  => 'bi-display',
    'storage'  => 'bi-device-hdd',
];
$routeMap = [
    'keyboard' => 'user.keyboard',
    'mouse'    => 'user.mouse',
    'headset'  => 'user.headset',
    'monitor'  => 'user.monitor',
    'storage'  => 'user.storage',
];
$icon = $icons[$category] ?? 'bi-box';
@endphp

{{-- Breadcrumb --}}
<div style="background:#fff; border-bottom:1px solid #e2e8f0; padding: 1rem 0;">
    <div class="container">
        <nav aria-label="breadcrumb" style="font-size:.85rem">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.home') }}" class="text-decoration-none text-primary">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route($routeMap[$category]) }}" class="text-decoration-none text-primary">
                        {{ $categoryName }}
                    </a>
                </li>
                <li class="breadcrumb-item active text-truncate" style="max-width:200px">
                    {{ $product->nama }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">

        {{-- ─── PRODUCT IMAGE ─── --}}
        <div class="col-md-5">
            <div style="background:#fff; border-radius:12px; border:1px solid #e2e8f0;
                        display:flex; align-items:center; justify-content:center;
                        min-height:320px; padding: 2rem;">
                @if($product->gambar)
                    <img src="{{ asset('images/' . $product->gambar) }}"
                         alt="{{ $product->nama }}"
                         style="max-width:100%; max-height:300px; object-fit:contain;">
                @else
                    <div class="text-center text-muted">
                        <i class="bi {{ $icon }}" style="font-size:5rem; opacity:.3;"></i>
                        <p class="mt-2 small">Gambar tidak tersedia</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- ─── PRODUCT INFO ─── --}}
        <div class="col-md-7">
            <div style="background:#fff; border-radius:12px; border:1px solid #e2e8f0; padding:2rem; height:100%;">

                <span class="badge-category mb-3 d-inline-block">
                    <i class="bi {{ $icon }} me-1"></i> {{ $categoryName }}
                </span>

                <h3 class="fw-bold mb-2">{{ $product->nama }}</h3>

                <div style="font-size:1.75rem; font-weight:800; color:#2563eb; margin-bottom:1.5rem;">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </div>

                {{-- Deskripsi jika ada --}}
                @if(isset($product->deskripsi) && $product->deskripsi)
                <div class="mb-3">
                    <h6 class="fw-semibold mb-1">Deskripsi</h6>
                    <p class="text-muted" style="font-size:.925rem; line-height:1.7">
                        {{ $product->deskripsi }}
                    </p>
                </div>
                @endif

                {{-- Info tambahan --}}
                <div style="background:#f8fafc; border-radius:8px; padding:1rem; font-size:.875rem;">
                    <div class="d-flex gap-3 flex-wrap text-muted">
                        <span><i class="bi bi-shield-check text-success me-1"></i> Produk Original</span>
                        <span><i class="bi bi-truck text-primary me-1"></i> Pengiriman Cepat</span>
                        <span><i class="bi bi-arrow-return-left text-warning me-1"></i> Garansi Resmi</span>
                    </div>
                </div>

                {{-- Back button --}}
                <div class="mt-3">
                    <a href="{{ route($routeMap[$category]) }}"
                       class="btn btn-outline-primary btn-sm" style="border-radius:8px;">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke {{ $categoryName }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ─── PRODUK TERKAIT ─── --}}
    @if($related->count())
    <section class="mt-5">
        <div class="section-heading">
            <h4><i class="bi {{ $icon }} text-primary"></i> Produk Lainnya</h4>
            <a href="{{ route($routeMap[$category]) }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-3">
            @foreach($related as $rel)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $rel,
                    'category' => $category
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

</div>
@endsection
