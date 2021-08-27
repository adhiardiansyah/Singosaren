@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Edit Produk')
@section('content')

<form action="/admin/updateProduct" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <h2 class="fw-bold mt-3 mb-5">Edit Produk</h2>
    <div class="mb-3">
        <label for="name" class="fw-bold mb-2">Nama Produk</label>
        <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ (old('name')) ? old('name') : $product->name }}">
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
            <option value="{{ $b->id_brand }}" {{ ( $b->id_brand == $product->id_brand) ? 'selected' : '' }}>
                {{ $b->nama }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="price" class="fw-bold mb-2">Harga</label>
        <input type="number" class="form-control shadow-none @error('price') is-invalid @enderror" id="price"
            name="price" value="{{ (old('price')) ? old('price') : $product->price }}">
        <div id="validationServer03Feedback" class="invalid-feedback">
            @error('price')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="fw-bold mb-2">Deskripsi Produk</label>
        <textarea name="description" class="form-control shadow-none @error('description') is-invalid @enderror"
            rows="5" id="description">{{ (old('description')) ? old('description') : $product->description }}</textarea>
        <div id="validationServer03Feedback" class="invalid-feedback">
            @error('description')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="picture" class="fw-bold mb-2">Foto Produk</label>
        <div class="col-sm-2">
            <img src="{{ asset('img/products/'.$product->picture) }}" class="img-thumbnail img-preview">
        </div>
        <div class="col-sm-8">
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture"
                    name="picture" onchange="previewProduct()">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @error('picture')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="pictureLama" value="{{ $product->picture }}">
    <input type="hidden" name="id_product" value="{{ $product->id_product }}">

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>

@endsection