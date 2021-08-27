@extends('layouts-admin/header')
@section('title', 'Dashboard Admin | Detail Pemesanan')
@section('content')

<div class="table-responsive-md">
    <table class="table" id="tabel">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kuantitas</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan data dari sini -->
            <?php $i = 1; $total = 0 ?>
            @foreach ($order as $o)
            <tr>
                <th><?= $i; $i++ ?></th>
                <td><?= $o->name ?></td>
                <td><?= $o->qty ?></td>
                <td>Rp. {{ number_format($o->price,0,',','.') }}</td>
                <td>Rp. {{ number_format($o->total,0,',','.') }}</td>
                <?php $total += $o->total ?>
            </tr>
            @endforeach
            <!-- Tutup perulangan -->
            <tr>
                <th colspan="4">Total</th>
                <td>Rp. {{ number_format($total,0,',','.') }}</td>
            </tr>
            <tr>
                <th>
                    Alamat Pengiriman
                </th>
                <td colspan="4" class="text-end">{{ $o->destination }}</td>
            </tr>
        </tbody>
    </table>
    <a href="/admin/order" class="btn btn-primary w-auto" style="width: 15%">&laquo Kembali</a>
</div>


@endsection