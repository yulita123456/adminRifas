<div class="card border-0 col-md-3 text-white rounded-0 kolom-kiri" style="width: 18rem; min-height: 100vh">
    <img src="assets/images/foto-cewe.png" class="rounded-circle img-thumbnail mt-3" alt="" style="object-fit: cover; width:10rem; height:10rem">
    <div class="card-body">
        <div class="identitas lh-1">
            <p class="fw-semibold fs-5">Florine Josephine</p>
            <p class="">florinejosephine17@gmail.com</p>
        </div>
        <br>
        <p><a href="/dashboard-admin" class="text-decoration-none text-white fs-5 {{ request()->is('dashboard-admin*') ? 'active' : '' }}">Dashboard</a></p>
        <p><a href="/pesanan-admin" class="text-decoration-none text-white fs-5 {{ request()->is('pesanan-admin*') ? 'active' : '' }}">Pesanan <span class="badge text-bg-warning rounded-circle">{{ count($dataOrderBaru) }}</span></a></p>
        <p><a href="/produk-admin" class="text-decoration-none text-white fs-5 {{ request()->is('produk-admin*') ? 'active' : '' }}">Produk</a></p>
        <p><a href="/seting-profil-admin" class="text-decoration-none text-white fs-5 {{ request()->is('seting-profil-admin*','seting-toko-admin') ? 'active' : '' }}">Seting</a></p>
        <p><a href="{{ route('proses.logout') }}" class="text-decoration-none text-white fs-5 {{ request()->is('keluar*') ? 'active' : '' }}">Keluar</a></p>
    </div>
</div>
