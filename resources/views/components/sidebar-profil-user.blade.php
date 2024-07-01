<div class="list-group shadow-sm">
    <a href="/profil" class="list-group-item  {{ request()->is('profil*') ? 'active' : ''   }} d-flex align-items-center list-group-item-action" aria-current="true"><i class="bi bi-person-fill fs-4 me-3"></i>Profil</a>
    <a href="/pesanan" class="list-group-item {{ request()->is('pesanan*') ? 'active' : '' }} d-flex align-items-center list-group-item-action"><i class="bi bi-list-check fs-4 me-3"></i>Pesanan</a>
    <a href="/alamat" class="list-group-item {{ request()->is('alamat*') ? 'active' : '' }} d-flex align-items-center list-group-item-action"><i class="bi bi-geo-alt fs-4 me-3"></i>Alamat</a>
    <a href="/wishlist" class="list-group-item {{ request()->is('wishlist*') ? 'active' : '' }} d-flex align-items-center list-group-item-action mb-5"><i class="bi bi-heart fs-4 me-3"></i> Favorit</a>
    <a href="{{ route('proses.logout') }}" class="list-group-item list-group-item-action text-center mt-5 logout">Keluar</a>
</div>