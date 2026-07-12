<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone - @yield('title', 'Toko Aksesoris Komputer')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --tz-blue:       #2563eb;
            --tz-blue-dark:  #1d4ed8;
            --tz-blue-light: #eff6ff;
            --tz-gray:       #f8fafc;
            --tz-border:     #e2e8f0;
            --tz-text:       #0f0f2b;
            --tz-muted:      #64748b;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--tz-gray);
            color: var(--tz-text);
            margin: 0;
        }

        /* ── NAVBAR ── */
        .navbar-techzone {
            background: #fff;
            border-bottom: 1px solid var(--tz-border);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 1px 8px rgba(0,0,0,.06);
        }

        .navbar-brand-tz {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--tz-blue);
            text-decoration: none;
        }

        .navbar-brand-tz .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--tz-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
        }

        .search-bar-wrap {
            flex: 1;
            max-width: 480px;
            margin: 0 1.5rem;
        }

        .search-bar-wrap .input-group {
            border-radius: 10px;
            overflow: hidden;
            border: 1.5px solid var(--tz-border);
        }

        .search-bar-wrap input {
            border: none;
            background: var(--tz-gray);
            font-size: .9rem;
        }

        .search-bar-wrap input:focus { box-shadow: none; background: #fff; }

        .search-bar-wrap .btn-search {
            background: var(--tz-blue);
            color: #fff;
            border: none;
            padding: 0 1rem;
        }

        .nav-categories {
            display: flex;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-categories a {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: .85rem;
            font-weight: 500;
            color: var(--tz-muted);
            text-decoration: none;
            transition: all .2s;
        }

        .nav-categories a:hover,
        .nav-categories a.active {
            background: var(--tz-blue-light);
            color: var(--tz-blue);
        }

        /* ── FOOTER ── */
        .footer-tz {
            background: #000000;
            color: #94a3b8;
            padding: 2.5rem 0 1.5rem;
            margin-top: 4rem;
        }

        .footer-tz h6 { color: #f1f5f9; font-weight: 700; margin-bottom: 1rem; }
        .footer-tz a  { color: #94a3b8; text-decoration: none; font-size: .875rem; }
        .footer-tz a:hover { color: #fff; }
        .footer-tz .footer-bottom {
            border-top: 1px solid #334155;
            padding-top: 1rem;
            margin-top: 1.5rem;
            font-size: .8rem;
        }

        /* ── PRODUCT CARD ── */
        .product-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--tz-border);
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(37,99,235,.1);
        }

        .product-card .img-wrap {
            background: var(--tz-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 180px;
            overflow: hidden;
        }

        .product-card .img-wrap img {
            max-height: 150px;
            max-width: 100%;
            object-fit: contain;
        }

        .product-card .card-body { padding: 1rem; }
        .product-card .product-name {
            font-weight: 600;
            font-size: .95rem;
            margin-bottom: .25rem;
            color: var(--tz-text);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card .product-price {
            color: var(--tz-blue);
            font-weight: 700;
            font-size: 1rem;
        }

        .product-card .btn-detail {
            display: block;
            text-align: center;
            margin-top: .75rem;
            padding: .45rem;
            border-radius: 8px;
            background: var(--tz-blue-light);
            color: var(--tz-blue);
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s;
        }

        .product-card .btn-detail:hover { background: var(--tz-blue); color: #fff; }

        /* ── SECTION HEADING ── */
        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .section-heading h4 {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-heading a {
            font-size: .85rem;
            color: var(--tz-blue);
            text-decoration: none;
            font-weight: 500;
        }

        /* ── HERO BANNER ── */
        .hero-banner {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #3b82f6 100%);
            color: #fff;
            padding: 3rem 0 2.5rem;
            margin-bottom: 2.5rem;
        }

        .hero-banner h1 { font-weight: 800; font-size: 2rem; }
        .hero-banner p  { opacity: .85; font-size: 1rem; }

        .category-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 50px;
            background: rgba(255,255,255,.15);
            color: #fff;
            font-size: .875rem;
            font-weight: 500;
            text-decoration: none;
            border: 1.5px solid rgba(255,255,255,.3);
            transition: background .2s;
        }

        .category-pill:hover { background: rgba(255,255,255,.25); color: #fff; }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 4rem 1rem;
            color: var(--tz-muted);
        }

        .empty-state i { font-size: 3rem; margin-bottom: 1rem; }

        /* ── BADGE CATEGORY ── */
        .badge-category {
            background: var(--tz-blue-light);
            color: var(--tz-blue);
            font-size: .75rem;
            font-weight: 600;
            padding: .3rem .7rem;
            border-radius: 20px;
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ─────────────── NAVBAR ─────────────── --}}
<nav class="navbar-techzone">
    <div class="container">
        <div class="d-flex align-items-center w-100 gap-3">

            {{-- Brand --}}
            <a href="{{ route('user.home') }}" class="navbar-brand-tz flex-shrink-0">
                <span class="brand-icon"><i class="bi bi-laptop"></i></span>
                TECHZONE
            </a>

            {{-- Search --}}
            <div class="search-bar-wrap d-none d-md-block">
                <form action="{{ url()->current() }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari produk..."
                               value="{{ request('search') }}">
                        <button class="btn-search" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Nav Categories --}}
            <ul class="nav-categories d-none d-lg-flex ms-auto">
                @php $currentRoute = Route::currentRouteName(); @endphp
                <li><a href="{{ route('user.home') }}"
                       class="{{ $currentRoute === 'user.home' ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('user.keyboard') }}"
                       class="{{ $currentRoute === 'user.keyboard' ? 'active' : '' }}">Keyboard</a></li>
                <li><a href="{{ route('user.mouse') }}"
                       class="{{ $currentRoute === 'user.mouse' ? 'active' : '' }}">Mouse</a></li>
                <li><a href="{{ route('user.headset') }}"
                       class="{{ $currentRoute === 'user.headset' ? 'active' : '' }}">Headset</a></li>
                <li><a href="{{ route('user.monitor') }}"
                       class="{{ $currentRoute === 'user.monitor' ? 'active' : '' }}">Monitor</a></li>
                <li><a href="{{ route('user.storage') }}"
                       class="{{ $currentRoute === 'user.storage' ? 'active' : '' }}">Storage</a></li>
            </ul>

            {{-- Mobile menu toggle --}}
            <button class="btn btn-sm btn-outline-secondary d-lg-none ms-auto"
                    data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile offcanvas menu --}}
<div class="offcanvas offcanvas-start" id="mobileMenu">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title fw-bold text-primary">Menu</h6>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
            <li class="mb-2"><a href="{{ route('user.home') }}" class="text-decoration-none text-dark fw-500">
                <i class="bi bi-house me-2 text-primary"></i> Beranda</a></li>
            <li class="mb-2"><a href="{{ route('user.keyboard') }}" class="text-decoration-none text-dark">
                <i class="bi bi-keyboard me-2 text-primary"></i> Keyboard</a></li>
            <li class="mb-2"><a href="{{ route('user.mouse') }}" class="text-decoration-none text-dark">
                <i class="bi bi-mouse me-2 text-primary"></i> Mouse</a></li>
            <li class="mb-2"><a href="{{ route('user.headset') }}" class="text-decoration-none text-dark">
                <i class="bi bi-headset me-2 text-primary"></i> Headset</a></li>
            <li class="mb-2"><a href="{{ route('user.monitor') }}" class="text-decoration-none text-dark">
                <i class="bi bi-display me-2 text-primary"></i> Monitor</a></li>
            <li class="mb-2"><a href="{{ route('user.storage') }}" class="text-decoration-none text-dark">
                <i class="bi bi-device-hdd me-2 text-primary"></i> Storage</a></li>
        </ul>
    </div>
</div>

{{-- ─────────────── CONTENT ─────────────── --}}
<main>
    @yield('content')
</main>

{{-- ─────────────── FOOTER ─────────────── --}}
<footer class="footer-tz">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h6><i class="bi bi-laptop me-2"></i>TECHZONE</h6>
                <p style="font-size:.875rem; line-height:1.7">
                    Toko aksesoris komputer & gaming terpercaya. Produk original,
                    harga terjangkau, pengiriman cepat ke seluruh Indonesia.
                </p>
            </div>
            <div class="col-md-2">
                <h6>Kategori</h6>
                <ul class="list-unstyled" style="line-height:2">
                    <li><a href="{{ route('user.keyboard') }}">Keyboard</a></li>
                    <li><a href="{{ route('user.mouse') }}">Mouse</a></li>
                    <li><a href="{{ route('user.headset') }}">Headset</a></li>
                    <li><a href="{{ route('user.monitor') }}">Monitor</a></li>
                    <li><a href="{{ route('user.storage') }}">Storage</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>Informasi</h6>
                <ul class="list-unstyled" style="line-height:2">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Cara Pemesanan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>Kontak</h6>
                <p style="font-size:.875rem; line-height:2">
                    <i class="bi bi-envelope me-2"></i>chrismastian@icloud.com<br>
                    <i class="bi bi-telephone me-2"></i>+62 852 9827 8468<br>
                    <i class="bi bi-geo-alt me-2"></i>Toraja utara, Sulawesi Selatan
                </p>
            </div>
        </div>
        <div class="footer-bottom text-center">
            &copy; {{ date('Y') }} TechZone. Semua hak dilindungi.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
