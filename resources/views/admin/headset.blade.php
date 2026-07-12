<!DOCTYPE html>

<html lang="en">

@include('admin.head')

<body id="page-top">

@include('admin.sidebar')                    

@include('admin.topbar')

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Headset</h1>

                    <a href="{{ url('/admin/tambah_headset') }}" class="btn btn-secondary">Tambah Data</a>
                    <br><br>
                    <table class="table">
                <thead>
                    <tr>
                    
                    <th scope="col" style="width: 5%">No</th>
                    <th scope="col" style="width: 40%">Nama</th>
                    <th scope="col" style="width: 15%">Harga</th>
                    <th scope="col" style="width: 20%">Gambar</th>
                    <th scope="col" style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($data_headset as $item)
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->harga }}</td>


                        <td>
                            <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px; align-items: center;">
                                <a href="{{ url('admin/edit_headset/' . $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('admin/hapus_headset/' . $item->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
                </table>
                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@include('admin.footer')

@include('admin.script')

</body>

</html>
