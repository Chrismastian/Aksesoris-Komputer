<!DOCTYPE html>

<html lang="en">

@include('admin.head')

<body id="page-top">

@include('admin.sidebar')                    

@include('admin.topbar')

<!-- Begin Page Content -->
                <div class="container-fluid">

                      <div class="card ml-auto mr-auto" style="width: 36rem;">
    <div class="card-header bg-primary text-white">
    Tambah Monitor
  </div>
  <div class="card-body">
    <div class="mb-3">
        <form action="{{ url('admin/simpan_monitor') }}" method="POST" enctype="multipart/form-data">
            @csrf
  <label class="form-label">Nama</label>
  <input type="text" class="form-control" name="nama">
  <label class="form-label">Harga</label>
  <input type="text" class="form-control" name="harga">
    <label class="form-label">Gambar</label>
  <input type="file" class="form-control" name="gambar">
  <button type="submit" class="btn btn-secondary mt-5">Submit</button>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@include('admin.footer')

@include('admin.script')

</body>

</html>
