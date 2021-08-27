@extends('layouts/header')
@section('title', 'Singosaren | Profil')
@section('content')

<div class="content" style="background:#F2F2F2">
    <div class="container">

        <!-- Page Heading -->
        <br>
        <h1 class="display-6 mb-4 text-gray-800">Profil Akun</h1>

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
            <div class="col-lg">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('img') }}/{{ Auth::user()->user_image }}"
                                class="card-img-top rounded-circle w-75 ml-5 mt-3" alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h4>{{ Auth::user()->name }}</h4>
                                    </li>
                                    <li class="list-group-item">{{ Auth::user()->email }}</li>
                                    @if (Auth::user()->phone_number)
                                    <li class="list-group-item">{{ Auth::user()->phone_number }}</li>
                                    @else
                                    <li class="list-group-item">-</li>
                                    @endif
                                    @if (Auth::user()->address)
                                    <li class="list-group-item">{{ Auth::user()->address }}</li>
                                    @else
                                    <li class="list-group-item">-</li>
                                    @endif
                                    <li class="list-group-item">
                                        <small><a href="/profil/edit" class="btn btn-primary">Edit Profil</a></small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-5">
        <br><br><br><br><br>
    </div>
</div>

@endsection