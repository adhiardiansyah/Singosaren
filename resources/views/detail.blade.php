@extends('layouts/header')
@section('title', 'Singosaren | '.$product->name)
@section('content')

<main class="container-fluid py-5" style="background:#F2F2F2">
    <div class="col-md-11 mx-auto mb-5">
        @if (session('pesan'))
        <script>
            Swal.fire(
                'Sukses!',
                '{{ session('pesan') }}',
                'success'
            )
        </script>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="p-3 rounded shadow-sm bg-white">
                    <img src="{{ url('img/products/'.$product->picture) }}" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-5">
                <div class="card p-5 shadow-sm border-0">
                    <h1 class="fw-bold">
                        {{ $product->name }}
                    </h1>
                    <aside class="mb-4">
                        <span class="badge bg-primary rounded-pill">
                            {{ $product->brand->nama }}
                        </span>
                    </aside>
                    <h5 class="fw-bold fs-6">Deskripsi:</h5>
                    <p class="text-secondary">
                        {{ $product->description }}
                    </p>
                    <hr>
                    <a href="/" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-5 shadow-sm border-0">
                    <h2 class="h4 text-center fw-bold">
                        Rp. {{ number_format($product->price,0,',','.') }}
                    </h2>
                    <hr>
                    <div class="d-flex flex-column">
                        <!-- Beli -->
                        <form action="/buyNow" class="d-flex mb-2" method="POST"> @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id_product }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="number" name="qty" class="form-control me-2 shadow-none" min=" 1" value="1"
                                required>
                            <button type="submit" class="shadow-none btn bg-primary text-white col-7"
                                title="Beli produk ini sekarang!">
                                Beli
                            </button>
                        </form>
                        <!-- Kalo mau menambahkan ke keranjang -->
                        <form action="/addToCart2" method="POST"> @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id_product }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <button type="submit" class="shadow-none btn btn-success w-100"
                                title="Tambah ke keranjang!">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection