@extends('layouts/header')
@section('title', 'Singosaren | Riwayat Pemesanan')
@section('content')

<div class="container-fluid" style="background:#F2F2F2">
    <div class="container">
        @if (session('pesan'))
        <script>
            Swal.fire(
                'Sukses!',
                '{{ session('pesan') }}',
                'success'
            )
        </script>
        @endif

        <br>
        <h1 class="display-3 mb-4">
            Riwayat Pemesanan
        </h1>
        <hr>
        <?php if($total > 0): ?>
        @foreach ($history as $code_order => $detail_history)
        <div class="p-5 rounded bg-white shadow-sm mb-5">
            <div class="d-flex align-items-center mb-5">
                <h2 class="fw-bold mb-0">#{{ $code_order }}</h2>
                <aside class="d-flex flex-column ms-auto text-end">
                    <time>{{ $detail_history['date_order'] }}</time>
                    <small class="mt-1 text-danger">{{ $detail_history['status'] }}</small>
                </aside>
            </div>
            <div class="overflow-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col" class="text-start">Harga</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0 ?>
                        @foreach ($detail_history['detail'] as $detail)
                        <tr>
                            <td class="col-4 py-5" style="vertical-align:middle">
                                {{ $detail['name'] }}
                            </td>
                            <td class="col-3 py-5 text-start" style="vertical-align:middle">
                                Rp. {{ number_format($detail['price'],0,',','.') }}
                            </td>
                            <td class="col-1 py-5" style="vertical-align:middle">
                                {{ $detail['qty'] }}
                            </td>
                            <td class="col-4 py-5 text-end" style="vertical-align:middle">
                                Rp. {{ number_format($detail['total'],0,',','.') }}
                                <?php $total += $detail['total'] ?>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="3">
                                Total
                            </th>
                            <td class="text-end">Rp. {{ number_format($total,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <th>
                                Alamat Pengiriman
                            </th>
                            <td colspan="3" class="text-end">{{ $detail_history['destination'] }}</td>
                        </tr>
                        <tr>
                            <th>
                                Opsi
                            </th>
                            <td colspan="3" class="text-end">
                                <a href="#" class="btn btn-danger deleteOrder"
                                    data-id="{{ $detail_history['id_order'] }}">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </a>
                                <a href="/payment/{{ $detail_history['id_order'] }}" class="btn btn-primary">
                                    <i class="bi bi-cash-coin"></i>
                                    Bayar
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        @endforeach
        <?php else: ?>
        <br><br>
        <h5 class="text-center py-5 mt-5">Kosong, silahkan checkout pemesanan.</h5>
        <div class="mt-5">
            <br><br><br><br><br><br>
        </div>
        <?php endif; ?>
    </div>
</div>

@endsection