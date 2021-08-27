@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Produk')
@section('content')

<div class="table-responsive">
    <div class="d-flex mb-5 justify-content-end">
        <span class="me-auto fs-3">📱</span>
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalProduk">Tambah Produk</button>
    </div>
    <table class="table table-bordered" id="tabel">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Brand</th>
                <th scope="col" class="text-center">Harga</th>
                <th scope="col" class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan data dari sini -->
            <?php $i = 1; ?>
            @foreach ($product as $p)
            <tr>
                <th style="vertical-align:middle;" class="text-center"><?= $i;$i++ ?></th>
                <td style="vertical-align:middle;" class="col-5">{{ $p->name }}</td>
                <td style="vertical-align:middle;" class="text-center">{{ $p->nama }}</td>
                <td style="vertical-align:middle;" class="text-center">Rp. {{ number_format($p->price,0,',','.') }}</td>
                <td style="vertical-align:middle;">
                    <div class="d-flex flex-column">
                        <a href="/admin/product/{{ $p->id_product }}" class="badge btn btn-dark mb-1">
                            <i class="bi bi-eye"></i>
                            Detail
                        </a>
                        <a href="/admin/editProduct/{{ $p->id_product }}" class="badge btn btn-warning text-white mb-1">
                            <i class="bi bi-pencil-square"></i>
                            Sunting
                        </a>
                        <a href="#" class="badge btn btn-danger text-white mb-1 w-100 deleteProduct"
                            data-id="{{ $p->id_product }}">
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
<div class="modal fade" id="modalProduk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/admin/addProduct" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <h2 class="fw-bold mt-3 mb-5">Tambah Produk Baru</h2>
                    <div class="mb-3">
                        <label for="name" class="fw-bold mb-2">Nama Produk</label>
                        <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ (old('name')) }}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="id_brand" class="fw-bold mb-2">Brand</label>
                        <select name="id_brand" class="form-select">
                            @foreach ($brand as $b)
                            <option value="{{ $b->id_brand }}">{{ $b->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="fw-bold mb-2">Harga</label>
                        <input type="number" class="form-control shadow-none @error('price') is-invalid @enderror"
                            id="price" name="price" value="{{ (old('price')) }}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="fw-bold mb-2">Deskripsi Produk</label>
                        <textarea name="description"
                            class="form-control shadow-none @error('description') is-invalid @enderror"
                            id="description"></textarea>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="fw-bold mb-2">Foto Produk</label>
                        <div class="col-sm-2">
                            <img src="{{ asset('img/bukti_bayar') }}/default.jpg" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                    id="picture" name="picture" onchange="previewProduct()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @error('picture')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection