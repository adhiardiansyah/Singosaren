@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Detail Akun')
@section('content')

<div class="table-responsive-md">
    <div class="row">
        <div class="col-12 col-md-6 border-end">
            <img src="{{ asset('img') }}/{{ $account->user_image }}" class="img-fluid">
        </div>
        <div class="col-12 col-md-6 p-3 p-md-5">
            <h1 class="h3 fw-bold">{{ $account->name }}</h1>
            <span class="badge rounded-pill px-2 {{ $account->role == 'admin' ? 'bg-success' : 'bg-primary' }}">
                {{ $account->role }}
            </span>
            <button class="badge btn btn-sm bg-transparent text-dark fs-6 shadow-none" data-bs-toggle="modal"
                data-bs-target="#modalVerifikasi">
                <i class="bi bi-pencil-square"></i>
            </button>
            <hr>
            <h5 class="fw-bold fs-6">Email:</h5>
            <p class="text-secondary">
                {{ $account->email }}
            </p>
            <h5 class="fw-bold fs-6">No. Telepon:</h5>
            <p class="text-secondary">
                @if ($account->phone_number)
                {{ $account->phone_number }}
                @else
                -
                @endif
            </p>
            <h5 class="fw-bold fs-6">Alamat:</h5>
            <p class="text-secondary">
                @if ($account->address)
                {{ $account->address }}
                @else
                -
                @endif
            </p>
            <a href="/admin/account" class="btn btn-primary w-auto" style="width: 15%">&laquo Kembali</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalVerifikasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/admin/updateRole" class="p-3" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <h2 class="fw-bold mt-3 mb-5">Ubah Role</h2>
                    <div class="mb-3">
                        <label for="id_group" class="fw-bold mb-2">Role</label>
                        <select name="id_group" class="form-select">
                            @foreach ($role as $r)
                            <option value="{{ $r->id }}" {{ ( $r->id == $account->id_group) ? 'selected' : '' }}>
                                {{ $r->role }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $account->id }}">

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection