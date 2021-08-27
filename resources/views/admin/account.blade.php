@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Akun')
@section('content')

<div class="table-responsive">
    <table class="table table-bordered" id="tabel">
        <thead class="table-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">Role</th>
                <th scope="col" class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan data dari sini -->
            <?php $i = 1; ?>
            @foreach ($account as $a)
            <tr>
                <th style="vertical-align:middle;" class="text-center"><?= $i;$i++ ?></th>
                <td style="vertical-align:middle;">{{ $a->name }}</td>
                <td style="vertical-align:middle;">{{ $a->email }}</td>
                <td style="vertical-align:middle;">{{ $a->phone_number }}</td>
                <td style="vertical-align:middle;">{{ $a->role }}</td>
                <td style="vertical-align:middle;">
                    <div class="d-flex flex-column">
                        <a href="/admin/detailAccount/{{ $a->id }}" class="badge btn btn-dark mb-1">
                            <i class="bi bi-eye"></i>
                            Detail
                        </a>
                        <a href="#" class="badge btn btn-danger text-white mb-1 w-100 deleteAccount"
                            data-id="{{ $a->id }}">
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

@endsection