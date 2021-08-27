@extends('layouts/header')
@section('title', 'Singosaren | Beranda')
@section('content')

<div class="content" style="background:#F2F2F2">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/banner/1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/3.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/4.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/5.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/6.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    @if (session('pesan'))
    <script>
        Swal.fire(
                'Sukses!',
                '{{ session('pesan') }}',
                'success'
            )
    </script>
    @endif

    <div class="container-fluid p-md-5">
        <div class="d-flex align-items-center mt-2 mt-md-0">
            <h1 class="fs-3 mb-0 me-auto">Katalog</h1>
            <div class="overflow-auto">
                @foreach ($brands as $b)
                <a href="/brand/{{ $b->id_brand }}" class="btn btn-sm btn-primary rounded-pill ms-1">{{ $b->nama }}</a>
                @endforeach
            </div>
        </div>
        <hr>

        <div class="row">
            @foreach ($products as $p)
            <a class="col-md-2 text-dark text-decoration-none mb-4 card-item d-flex align-items-stretch"
                href="/detail/{{ $p->id_product }}" title="{{ $p->name }}">
                <div class="col-12 card p-3 shadow-sm border-0">
                    <img src="{{ url('img/products/'.$p->picture) }}" class="card-img-top card-item-img">
                    <div class="card-body card-item-body text-center">
                        <p class="fs-6 text-body">
                            {{ $p->name }}
                        </p>
                        <small class="fw-bold">
                            Rp. {{ number_format($p->price,0,',','.') }}
                        </small>
                    </div>
                    <div class="d-flex">
                        <div class="btn btn-sm bg-primary text-white col me-2">
                            Detail
                        </div>
                        <form action="/addToCart" method="POST" class="ms-auto"> @csrf
                            <input type="hidden" name="product_id" value="{{ $p->id_product }}">
                            <input type="hidden" name="price" value="{{ $p->price }}">
                            <button type="submit" class="btn btn-sm btn-success" title="Tambah ke Keranjang">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <?php if($qtyResult == 0): ?>
        <h5 class="text-center py-5 mt-5">Produk yang dicari tidak ada.</h5>
        <div class="mt-5">
            <br>
        </div>
        <?php else: ?>
        <?php endif; ?>

    </div>
</div>

@endsection