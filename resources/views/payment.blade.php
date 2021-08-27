@extends('layouts/header')
@section('title', 'Singosaren | Riwayat Belanja')
@section('content')

<div class="content" style="background:#F2F2F2">
    <div class="container py-5">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="portfolio-info shadow p-4 mb-3 bg-body rounded" style="background-color: white;">
                    <h2 class="my-3">Bayar Pemesanan</h2>
                    Untuk pembayaran silahkan transfer ke salah satu dari berikut : <br>
                    Mandiri 9000025729642 A/N Aminingsih <br>
                    BRI 686401008749531 A/N Aminingsih <br>
                    DANA 083866811948 A/N Adhi Ardiansyah <br>
                    OVO 083866811948 A/N Adhi Ardiansyah <br><br>
                    Setelah itu unggah bukti pembayaran di bawah ini.
                    <br><br>
                    <form action="/updatePayment" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="bukti_bayarLama" value="{{ $order->bukti_bayar }}">
                        <div class="row mb-3">
                            <label for="bukti_bayar" class="col-sm-2 col-form-label">Unggah Bukti Pembayaran</label>
                            <div class="col-sm-2">
                                <img src="{{ asset('img/bukti_bayar') }}/{{ $order->bukti_bayar }}"
                                    class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control @error('bukti_bayar') is-invalid @enderror"
                                        id="bukti_bayar" name="bukti_bayar" onchange="previewImage()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        @error('bukti_bayar')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_order" value="{{ $order->id_order }}">
                        <button type="submit" class="btn btn-dark">
                            <i class="bi bi-upload"></i>
                            Unggah
                        </button>
                    </form>
                </div>
                <a href="/history" class="btn btn-primary ml-3">&laquo Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection