<!DOCTYPE html>

<html lang="en">

@include('admin.head')

<body id="page-top">

@include('admin.sidebar')

@include('admin.topbar')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Pesanan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            @if($orders->isEmpty())
                <p class="text-muted mb-0">Belum ada pesanan.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode</th>
                                <th>Pelanggan</th>
                                <th>Kontak</th>
                                <th>Produk</th>
                                <th class="text-right">Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="font-weight-bold">{{ $order->code }}</td>
                                    <td>
                                        {{ $order->nama }}<br>
                                        <small class="text-muted">{{ $order->alamat }}</small>
                                    </td>
                                    <td>
                                        {{ $order->telepon }}<br>
                                        @if($order->email)
                                            <small class="text-muted">{{ $order->email }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($order->items as $item)
                                            <div style="font-size:.8rem">
                                                {{ $item->nama }} &times; {{ $item->qty }}
                                            </div>
                                        @endforeach
                                        @if($order->catatan)
                                            <small class="text-muted d-block mt-1">Catatan: {{ $order->catatan }}</small>
                                        @endif
                                    </td>
                                    <td class="text-right align-middle">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td class="align-middle">
                                        <form action="{{ url('/admin/pesanan/' . $order->id . '/status') }}" method="POST"
                                              class="d-flex gap-1">
                                            @csrf
                                            <select name="status" class="form-control form-control-sm">
                                                @foreach(['pending', 'paid', 'shipped', 'cancelled'] as $s)
                                                    <option value="{{ $s }}" @selected($order->status === $s)>{{ $s }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="align-middle">{{ $order->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">{{ $orders->links() }}</div>
            @endif
        </div>
    </div>

</div>

</div>

@include('admin.footer')

@include('admin.script')

</body>

</html>
