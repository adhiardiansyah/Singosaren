<nav class="navbar navbar-expand-lg navbar-light bg-dark py-3">
    <div class="container">
        <a class="navbar-brand text-white" href="/">
            <img src="{{ asset('img/icon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Singosaren
        </a>
        <form action="/" method="post" class="col-5 input-group ml-auto"> @csrf
            <input class="form-control" type="search" name="keyword" placeholder="Cari" aria-label="Search">
            <button class="btn btn-primary rounded-0" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <a href="/cart" class="text-decoration-none">
            <i class="fas fa-shopping-cart" style="color:white"></i>
            <?php if (Auth::check()) : ?>
            <?php $totalcart = 0; ?>
            @foreach ($cart as $c)
            <?php 
        $totalcart = $totalcart+$c->qty; 
    ?>
            @endforeach
            <?php else : ?>

            <?php endif; ?>
            <small class="small badge bg-primary">{{ Auth::check() ? $totalcart : 0 }}</small>
        </a>
        <?php if (Auth::check()) : ?>
        <?php else : ?>
        <button class="navbar-toggler mt-1 bg-white" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php endif; ?>

        <?php if (Auth::check()) : ?>
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="color: black">
                    <img class="img-profile rounded-circle" width="20px"
                        src="{{ asset('img') }}/{{ Auth::user()->user_image }}">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark dropdown-menu-lg-right"
                    aria-labelledby="navbarDropdown">
                    <a class="dropdown-item py-3" href="/profil">
                        <i class="bi bi-person-circle me-2"></i>
                        Profil
                    </a>
                    <a class="dropdown-item py-3" href="/history">
                        <i class="bi bi-credit-card-2-front me-2"></i>
                        Riwayat
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="dropdown-item py-3">
                            <i class="fas fa-sign-out-alt"></i>
                            <button class="bg-transparent border-0" type="submit" style="color: #dee2e6">Keluar</button>
                        </a>
                    </form>
            </li>
        </ul>
        <?php else : ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mr-auto"></div>

            <ul class="navbar-nav mt-2">
                <li class="nav-item mb-2">
                    <a class="btn btn-primary text-white" href="/login">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk
                    </a>
                </li>
                <li class="nav-item ml-lg-2">
                    <a class="btn btn-primary text-white" href="/register">
                        <i class="fas fa-user-plus"></i>
                        Daftar
                    </a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>