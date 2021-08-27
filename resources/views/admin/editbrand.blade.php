@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Edit Brand')
@section('content')

<form action="/admin/updateBrand" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <h2 class="fw-bold mt-3 mb-5">Edit Brand</h2>
    <div class="mb-3">
        <label for="nama" class="fw-bold mb-2">Nama Brand</label>
        <input type="text" class="form-control shadow-none @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ (old('nama')) ? old('nama') : $brand->nama }}">
        <div id="validationServer03Feedback" class="invalid-feedback">
            @error('nama')
            {{ $message }}
            @enderror
        </div>
    </div>
    <input type="hidden" name="id_brand" value="{{ $brand->id_brand }}">

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>

@endsection