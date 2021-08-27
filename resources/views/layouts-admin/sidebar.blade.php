<div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <i class="bi bi-phone me-1 fs-4"></i>
        <span class="fs-4 fw-bold">Singosaren</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="/admin/order" class="nav-link text-dark {{ request()->is('admin/order') ? 'active' : '' }}">
                <i class="bi bi-wallet2 me-2"></i>
                Pemesanan
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/product" class="nav-link text-dark {{ request()->is('admin/product') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i>
                Produk
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/brand" class="nav-link text-dark {{ request()->is('admin/brand') ? 'active' : '' }}">
                <i class="bi bi-tags me-2"></i>
                Brand
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/account" class="nav-link text-dark {{ request()->is('admin/account') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i>
                Akun
            </a>
        </li>
    </ul>
    <hr>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a class="nav-link text-dark">
            <i class="fas fa-sign-out-alt"></i>
            <button class="bg-transparent border-0" type="submit">Keluar</button>
        </a>
    </form>
</div>