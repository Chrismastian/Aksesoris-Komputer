@extends('layouts.user')

@section('title', 'Pesanan ' . $order->code . ' - TechZone')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <i class="bi bi-check-circle text-success" style="font-size:3.5rem;"></i>
        <h4 class="mt-2">Pesanan Berhasil Dibuat</h4>
        <p class="text-muted mb-1">Nomor pesanan Anda:</p>
        <p class="fw-bold" style="font-size:1.2rem; color:#2563eb;">{{ $order->code }}</p>
        <p class="text-muted small">Simpan nomor ini. Admin akan menghubungi Anda untuk konfirmasi.</p>
    </div>

    <div style="background:#fff; border-radius:12px; border:1px solid #e2e8f0; padding:1.75rem;">
        <h6 class="fw-bold mb-3">Detail Pesanan</h6>

        <div class="row mb-3" style="font-size:.9rem;">
            <div class="col-md-6">
                <p class="mb-1"><span class="text-muted">Nama:</span> {{ $order->nama }}</p>
                <p class="mb-1"><span class="text-muted">Telepon:</span> {{ $order->telepon }}</p>
                @if($order->email)
                    <p class="mb-1"><span class="text-muted">Email:</span> {{ $order->email }}</p>
                @endif
            </div>
            <div class="col-md-6">
                <p class="mb-1"><span class="text-muted">Tanggal:</span> {{ $order->created_at->format('d M Y H:i') }}</p>
                <p class="mb-1"><span class="text-muted">Status:</span> <span class="badge bg-warning text-uppercase">{{ $order->status }}</span></p>
                @if($order->catatan)
                    <p class="mb-1"><span class="text-muted">Catatan:</span> {{ $order->catatan }}</p>
                @endif
            </div>
        </div>

        <p class="mb-2"><span class="text-muted">Alamat:</span><br>{{ $order->alamat }}</p>

        <hr>

        <div class="table-responsive">
            <table class="table table-sm align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $item->qty }}</td>
                            <td class="text-end">Rp {{ number_format($item->subtotal(), 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total</td>
                        <td class="text-end fw-bold">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('user.home') }}" class="btn btn-outline-primary" style="border-radius:8px;">
            <i class="bi bi-arrow-left me-1"></i> Kembali Belanja
        </a>
    </div>
</div>
@endsection
