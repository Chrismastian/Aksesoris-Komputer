@extends('layouts.user')

@section('title', 'Keranjang Belanja - TechZone')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Keranjang Belanja</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $key => $item)
                        @php $subtotal = $item['price'] * $item['qty']; $total += $subtotal; @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if($item['image'])
                                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width:60px;height:60px;object-fit:contain;">
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $item['name'] }}</div>
                                        <div class="text-muted small">{{ ucfirst($item['category']) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td style="width:150px">
                                <form action="{{ route('cart.update', $key) }}" method="POST" class="d-flex gap-1">
                                    @csrf
                                    <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="form-control form-control-sm">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $key) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total</td>
                        <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary">Kosongkan Keranjang</button>
            </form>
            <a href="#" class="btn btn-primary">Checkout</a>
        </div>
    @else
        <div class="alert alert-info">Keranjang belanja kosong.</div>
        <a href="{{ route('user.home') }}" class="btn btn-primary">Kembali Belanja</a>
    @endif
</div>
@endsection
