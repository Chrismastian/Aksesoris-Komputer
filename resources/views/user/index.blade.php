@extends('layouts.user')

@section('title', 'Beranda - TechZone')

@section('content')

{{-- ─── HERO BANNER ─── --}}
<section class="hero-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <p class="mb-2" style="opacity:.75; font-size:.85rem; text-transform:uppercase; letter-spacing:.1em">
                    Aksesoris Komputer & Gaming
                </p>
                <h1>Temukan Gear Terbaik<br>untuk Setup Kamu</h1>
                <p class="mb-3">Keyboard, mouse, headset, monitor, dan storage dari brand terpercaya dengan harga terjangkau.</p>

                {{-- Category pills --}}
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="{{ route('user.keyboard') }}" class="category-pill">
                        <i class="bi bi-keyboard"></i> Keyboard
                    </a>
                    <a href="{{ route('user.mouse') }}" class="category-pill">
                        <i class="bi bi-mouse"></i> Mouse
                    </a>
                    <a href="{{ route('user.headset') }}" class="category-pill">
                        <i class="bi bi-headset"></i> Headset
                    </a>
                    <a href="{{ route('user.monitor') }}" class="category-pill">
                        <i class="bi bi-display"></i> Monitor
                    </a>
                    <a href="{{ route('user.storage') }}" class="category-pill">
                        <i class="bi bi-device-hdd"></i> Storage
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex justify-content-end">
                <div style="font-size: 8rem; opacity:.25;">
                    <i class="bi bi-laptop"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container pb-5">

    {{-- ─── KEYBOARD ─── --}}
    @if($keyboards->count())
    <section class="mb-5">
        <div class="section-heading">
            <h4><i class="bi bi-keyboard text-primary"></i> Keyboard</h4>
            <a href="{{ route('user.keyboard') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-3">
            @foreach($keyboards as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $product,
                    'category' => 'keyboard'
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ─── MOUSE ─── --}}
    @if($mouses->count())
    <section class="mb-5">
        <div class="section-heading">
            <h4><i class="bi bi-mouse text-primary"></i> Mouse</h4>
            <a href="{{ route('user.mouse') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-3">
            @foreach($mouses as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $product,
                    'category' => 'mouse'
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ─── HEADSET ─── --}}
    @if($headsets->count())
    <section class="mb-5">
        <div class="section-heading">
            <h4><i class="bi bi-headset text-primary"></i> Headset</h4>
            <a href="{{ route('user.headset') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-3">
            @foreach($headsets as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $product,
                    'category' => 'headset'
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ─── MONITOR ─── --}}
    @if($monitors->count())
    <section class="mb-5">
        <div class="section-heading">
            <h4><i class="bi bi-display text-primary"></i> Monitor</h4>
            <a href="{{ route('user.monitor') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-3">
            @foreach($monitors as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $product,
                    'category' => 'monitor'
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ─── STORAGE ─── --}}
    @if($storages->count())
    <section class="mb-5">
        <div class="section-heading">
            <h4><i class="bi bi-device-hdd text-primary"></i> Storage</h4>
            <a href="{{ route('user.storage') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-3">
            @foreach($storages as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('user.partials.product-card', [
                    'product'  => $product,
                    'category' => 'storage'
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Jika tidak ada produk sama sekali --}}
    @if($keyboards->isEmpty() && $mouses->isEmpty() && $headsets->isEmpty() && $monitors->isEmpty() && $storages->isEmpty())
    <div class="empty-state">
        <i class="bi bi-box-seam d-block"></i>
        <h5>Belum ada produk tersedia</h5>
        <p>Admin belum menambahkan produk. Silakan cek kembali nanti.</p>
    </div>
    @endif

</div>
@endsection
