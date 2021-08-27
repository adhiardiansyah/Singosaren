@extends('layouts/header')
@section('title', 'Singosaren | Keranjang')
@section('content')

<div class="content" style="background:#F2F2F2">
    <div class="container">
        @if (session('pesan'))
        <script>
            Swal.fire(
                'Sukses!',
                '{{ session('pesan') }}',
                'success'
            )
        </script>
        @endif

        <br>
        <h1 class="display-4 mb-3">
            Keranjang
        </h1>
        <div class="row justify-content-between">
            <?php $totalcart = 0; ?>
            @foreach ($cart as $c)
            <?php 
            $totalcart = $totalcart+$c->qty; 
        ?>
            @endforeach
            <?php if($totalcart >= 1): ?>
            <div class="">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col" class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $c)
                        <tr>
                            <td class="col-6 py-5 fw-bold" style="vertical-align:middle">{{ $c->name }}</td>
                            <td class="col-3 py-5" style="vertical-align:middle">Rp.
                                {{ number_format($c->price*$c->qty,0,',','.') }}</td>
                            <form action="/updateCart" method="post"> @csrf
                                <td class="col-2 py-5" style="vertical-align:middle">
                                    <input type="number" name="qty" value="{{ $c->qty }}"
                                        class="form-control bg-transparent border-0 shadow-none fw-bold" min="1"
                                        required>
                                </td>
                                <td class="col-1 py-5">
                                    <input type="hidden" name="id_cart" value="{{ $c->id_cart }}">
                                    <button type="submit" class="btn bg-transparent shadow-none" title="Simpan">
                                        <i class="bi bi-arrow-repeat fs-5"></i>
                                    </button>
                            </form>
                            <a href="#" class="btn bg-transparent shadow-none deleteCart" data-id="{{ $c->id_cart }}"
                                title="Hapus">
                                <i class="bi bi-x fs-3"></i>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-10 mt-5">
            <h5 class="border-bottom border-dark pb-3">Pesanan Kamu</h5>
            <table class="table">
                <tr>
                    <td class="py-3">Jumlah Pembelian:</td>
                    <td class="py-3 text-end fw-bold">{{ $totalcart }}</td>
                </tr>
                <tr>
                    <td class="py-3">Total:</td>
                    <td class="py-3 text-end fw-bold">
                        <?php $totalprice = 0; ?>
                        @foreach ($cart as $c)
                        <?php 
                        $totalprice = $totalprice+($c->price*$c->qty); 
                    ?>
                        @endforeach
                        Rp. {{ number_format($totalprice,0,',','.') }}
                    </td>
                </tr>
                <tr>
                    <td class="py-3">Tujuan:</td>
                    <td class="py-3 text-end fw-bold">
                        <form action="/checkout" method="post" class="d-flex"> @csrf
                            <textarea name="destination" class="form-control bg-light" cols="30" rows="2"
                                placeholder="Jalan, Dusun, Desa/Kelurahan, Kecamatan, Kabupaten/Kota">{{Auth::user()->address}}</textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-dark w-100 shadow-none mb-5">Checkout</button>
            </form>
        </div>

        <?php else: ?>
        <hr class="ml-3" style="width: 91%">
        <br><br><br><br>
        <h5 class="text-center py-5 mt-5">Keranjang kosong</h5>
        <div class="mt-5">
            <br><br><br><br><br>
        </div>
        <?php endif; ?>
    </div>
</div>

@endsection