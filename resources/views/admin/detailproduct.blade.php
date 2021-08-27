@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Detail Produk')
@section('content')

<div class="table-responsive-md">
    <div class="row">
        <div class="col-12 col-md-6 border-end">
            <img src="{{ url('img/products/'.$product->picture) }}" class="img-fluid">
        </div>
        <div class="col-12 col-md-6 p-5">
            <h1 class="h3 fw-bold">{{ $product->name }}</h1>
            <span class="badge bg-primary rounded-pill">
                {{ $product->brand->nama }}
            </span>
            <hr>
            <h5 class="fw-bold fs-6">Deskripsi:</h5>
            <p class="text-secondary">
                {{ $product->description }}
            </p>
            <a href="/admin/product" class="btn btn-primary w-auto" style="width: 15%">&laquo Kembali</a>
        </div>
    </div>
</div>


@endsection