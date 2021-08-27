@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Pemesanan')
@section('content')

<div class="table-responsive">
    <table class="table table-bordered" id="tabel">
        <thead class="table-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Kode</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">Status</th>
                <th scope="col">Bukti Bayar</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan data dari sini -->
            <?php $i = 1 ?>
            @foreach ($order as $o)
            <tr>
                <th><?= $i ?></th>
                <td>{{ $o->name }}</td>
                <td>{{ $o->code_order }}</td>
                <td>{{ $o->date_order }}</td>
                <td>{{ $o->status }}</td>
                <td><img src="{{ asset('img/bukti_bayar') }}/{{ $o->bukti_bayar }}" alt="" width="200px"></td>
                <td>
                    <a href="/admin/order/{{ $o->id_order }}" class="badge btn btn-dark btn-sm mb-1 w-100">
                        <i class="bi bi-eye-fill me-1"></i>Detail
                    </a>
                    <form action="/admin/order/verified" method="post" class="w-100"> @csrf
                        <input type="hidden" name="id_order" value="{{ $o->id_order }}">
                        <button type="submit" class="badge btn btn-primary btn-sm text-white mb-1 w-100">
                            <i class="bi bi-truck me-1"></i>Verifikasi
                        </button>
                    </form>
                    <form action="/admin/order/accepted" method="post" class="w-100"> @csrf
                        <input type="hidden" name="id_order" value="{{ $o->id_order }}">
                        <button type="submit" class="badge btn btn-success btn-sm text-white mb-1 w-100">
                            <i class="bi bi-check-all me-1"></i>Diterima
                        </button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
            <!-- Tutup perulangan -->
        </tbody>
    </table>
</div>
<!-- Menambahkan filter dan sorting di tabel -->
<script>
    $(document).ready(function () {
		$('#tabel').DataTable();
	});

</script>


@endsection