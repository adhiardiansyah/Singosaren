@extends('layouts/header')
@section('title', 'Singosaren | Edit Profil')
@section('content')

<div class="content" style="background:#F2F2F2">
    <div class="container">

        <!-- Page Heading -->
        <br>
        <h1 class="h3 mb-4 text-gray-800" style="margin-left: 17%">Edit Profil</h1>

        <div class="row justify-content-center mb-3">
            <div class="col-8">
                <form action="/profil/update" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="user_imageLama" value="{{ Auth::user()->user_image }}">
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ (old('email')) ? old('email') : $user->email }}">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ (old('name')) ? old('name') : $user->name }}">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number"
                                value="{{ (old('phone_number')) ? old('phone_number') : $user->phone_number }}">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @error('phone_number')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" value="{{ (old('address')) ? old('address') : $user->address }}">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @error('address')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="user_image" class="col-sm-2 col-form-label">Foto Profil</label>
                        <div class="col-sm-2">
                            <img src="{{ asset('img') }}/{{ Auth::user()->user_image }}"
                                class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control @error('user_image') is-invalid @enderror"
                                    id="user_image" name="user_image" onchange="previewProfil()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @error('user_image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
    <br><br>
</div>

@endsection