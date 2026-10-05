@extends('layouts.user')

@section('title', $category . ' - TechZone')

@section('content')

@php
$icons = [
    'Keyboard' => 'bi-keyboard',
    'Mouse'    => 'bi-mouse',
    'Headset'  => 'bi-headset',
    'Monitor'  => 'bi-display',
    'Storage'  => 'bi-device-hdd',
];
$icon = $icons[$category] ?? 'bi-box';
@endphp

{{-- ─── PAGE HEADER ─── --}}
<div style="background:#fff; border-bottom:1px solid #e2e8f0; padding: 1.5rem 0;">
    <div class="container">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" style="font-size:.85rem; margin-bottom:.5rem">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.home') }}" class="text-decoration-none text-primary">Beranda</a>
                </li>
                <li class="breadcrumb-item active">{{ $category }}</li>
            </ol>
        </nav>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h4 class="fw-bold mb-0 d-flex align-items-center gap-2">
                <i class="bi {{ $icon }} text-primary"></i> {{ $category }}
                @if($products->total())
                    <span class="badge-category">{{ $products->total() }} produk</span>
                @endif
            </h4>

            {{-- Search bar --}}
            <form action="{{ route('user.category', $slug) }}" method="GET"
                  class="d-flex gap-2" style="min-width:260px">
                <input type="text" name="search" class="form-control form-control-sm"
                       placeholder="Cari {{ $category }}..."
                       value="{{ request('search') }}"
                       style="border-radius:8px;">
                <button type="submit" class="btn btn-primary btn-sm px-3"
                        style="border-radius:8px;">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search'))
                    <a href="{{ route('user.category', $slug) }}"
                       class="btn btn-outline-secondary btn-sm" style="border-radius:8px;">
                        <i class="bi bi-x"></i>
                    </a>
                @endif
            </form>
        </div>

        @if(request('search'))
            <p class="mb-0 mt-2 text-muted" style="font-size:.875rem">
                Hasil pencarian untuk "<strong>{{ request('search') }}</strong>"
            </p>
        @endif
    </div>
</div>

{{-- ─── PRODUCT GRID ─── --}}
<div class="container py-4">

    @if($products->count())
        <div class="row g-3">
            @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $product,
                    'category' => strtolower($category)
                ])
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($products->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(request()->query())->links() }}
        </div>
        @endif

    @else
        <div class="empty-state">
            <i class="bi {{ $icon }} d-block"></i>
            @if(request('search'))
                <h5>Produk tidak ditemukan</h5>
                <p>Tidak ada {{ $category }} yang cocok dengan "{{ request('search') }}".</p>
                <a href="{{ route('user.category', $slug) }}" class="btn btn-primary btn-sm mt-2">
                    Lihat Semua {{ $category }}
                </a>
            @else
                <h5>Belum ada produk {{ $category }}</h5>
                <p>Admin belum menambahkan produk untuk kategori ini.</p>
            @endif
        </div>
    @endif

</div>

@endsection

@push('styles')
{{-- Override Bootstrap pagination to match site style --}}
<style>
    .pagination .page-link {
        color: var(--tz-blue);
        border-radius: 8px;
        margin: 0 2px;
    }
    .pagination .page-item.active .page-link {
        background: var(--tz-blue);
        border-color: var(--tz-blue);
    }
</style>
@endpush
