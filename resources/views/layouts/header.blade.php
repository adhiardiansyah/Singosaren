<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        @include('layouts/nav')

        @yield('content')

        @include('layouts/footer')

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script>
            function previewImage() {
                const bukti_bayar = document.querySelector('#bukti_bayar');
                const imgPreview = document.querySelector('.img-preview');

                const fileBayar = new FileReader();
                fileBayar.readAsDataURL(bukti_bayar.files[0]);

                fileBayar.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }

            function previewProfil() {
                const user_image = document.querySelector('#user_image');
                const imgPreview = document.querySelector('.img-preview');

                const fileBayar = new FileReader();
                fileBayar.readAsDataURL(user_image.files[0]);

                fileBayar.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }
        </script>

        <script>
            $('.deleteCart').click(function() {
                var id_cart = $(this).attr('data-id');
                Swal.fire({
                    title: 'Yakin?',
                    text: "Data akan terhapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/deleteCart/"+id_cart+""
                    } else {
                        Swal.fire(
                        'Gagal!',
                        'Data tidak akan dihapus.',
                        'error'
                        )
                    }
                })
            })

            $('.deleteOrder').click(function() {
                var id_order = $(this).attr('data-id');
                Swal.fire({
                    title: 'Yakin?',
                    text: "Data akan terhapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/deleteOrder/"+id_order+""
                    } else {
                        Swal.fire(
                        'Gagal!',
                        'Data tidak akan dihapus.',
                        'error'
                        )
                    }
                })
            })
        </script>
    </div>
</body>

</html>