@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Brand')
@section('content')

<div class="table-responsive">
    <div class="d-flex mb-5 justify-content-end">
        <span class="me-auto fs-3">📱</span>
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalBrand">Tambah Brand</button>
    </div>
    <table class="table table-bordered" id="tabel">
        <thead class="table-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Brand</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col" class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan data dari sini -->
            <?php $i = 1; ?>
            @foreach ($brand as $b)
            <tr>
                <th style="vertical-align:middle;" class="col-1 text-center"><?= $i;$i++ ?></th>
                <td style="vertical-align:middle;" class="col-5">{{ $b->nama }}</td>
                <td style="vertical-align:middle;">{{ $b->jumlah_produk }}</td>
                <td style="vertical-align:middle;" class="col-1">
                    <div class="d-flex flex-column">
                        <a href="/admin/editBrand/{{ $b->id_brand }}" class="badge btn btn-warning text-white mb-1">
                            <i class="bi bi-pencil-square"></i>
                            Sunting
                        </a>
                        <a href="#" class="badge btn btn-danger text-white mb-1 w-100 deleteBrand"
                            data-id="{{ $b->id_brand }}">
                            <i class="bi bi-trash"></i>
                            Hapus
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            <!-- Tutup perulangan -->
        </tbody>
    </table>
    <!-- Menambahkan filter dan sorting di tabel -->
    <script>
        $(document).ready(function () {
		$('#tabel').DataTable();
	});

    </script>
</div>


<!-- Modal -->
<div class="modal fade" id="modalBrand" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/admin/addBrand" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <h2 class="fw-bold mt-3 mb-5">Tambah Brand Baru</h2>
                    <div class="mb-3">
                        <label for="nama" class="fw-bold mb-2">Nama Brand</label>
                        <input type="text" class="form-control shadow-none @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ (old('nama')) }}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            @error('nama')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection