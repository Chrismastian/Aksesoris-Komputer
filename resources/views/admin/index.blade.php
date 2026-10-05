<!DOCTYPE html>

<html lang="en">

@include('admin.head')

<body id="page-top">

@include('admin.sidebar')

@include('admin.topbar')

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Pending</div>
                    <div class="h5 mb-0 font-weight-bold">{{ $pending }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan (paid + shipped)</div>
                    <div class="h5 mb-0 font-weight-bold">Rp {{ number_format($revenue, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <span class="h6 mb-0">Pesanan Terbaru</span>
            <a href="{{ url('/admin/pesanan') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
        </div>
        <div class="card-body">
            @if($recentOrders->isEmpty())
                <p class="text-muted mb-0">Belum ada pesanan masuk.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode</th>
                                <th>Pelanggan</th>
                                <th>Item</th>
                                <th class="text-right">Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                                <tr>
                                    <td class="font-weight-bold">{{ $order->code }}</td>
                                    <td>{{ $order->nama }}</td>
                                    <td>{{ $order->items->count() }} item</td>
                                    <td class="text-right">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td><span class="badge badge-warning">{{ $order->status }}</span></td>
                                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@include('admin.footer')

@include('admin.script')

</body>

</html>
