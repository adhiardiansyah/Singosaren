<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Data Table -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="d-flex align-items-stretch min-vh-100 bg-light">
        @include('layouts-admin/sidebar')
        <div class="container-fluid p-5 bg-light">
            <h1 class="col-12 col-md-6 h3 fw-light">@yield('title')</h1>
            @if (session('pesan'))
            <script>
                Swal.fire(
                    'Sukses!',
                    '{{ session('pesan') }}',
                    'success'
                )
            </script>
            @endif
            <hr>
            <div class="card shadow-sm border-0 p-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script>
        function previewProduct() {
        const user_image = document.querySelector('#picture');
        const imgPreview = document.querySelector('.img-preview');

        const fileBayar = new FileReader();
        fileBayar.readAsDataURL(picture.files[0]);

        fileBayar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    </script>

    <script>
        $('.deleteProduct').click(function() {
        var id_product = $(this).attr('data-id');
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
                window.location = "/admin/deleteProduct/"+id_product+""
            } else {
                Swal.fire(
                'Gagal!',
                'Data tidak akan dihapus.',
                'error'
                )
            }
        })
    })

    $('.deleteBrand').click(function() {
        var id_brand = $(this).attr('data-id');
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
                window.location = "/admin/deleteBrand/"+id_brand+""
            } else {
                Swal.fire(
                'Gagal!',
                'Data tidak akan dihapus.',
                'error'
                )
            }
        })
    })

    $('.deleteAccount').click(function() {
        var id = $(this).attr('data-id');
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
                window.location = "/admin/deleteAccount/"+id+""
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
</body>

</html>