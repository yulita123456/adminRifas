<p class="fs-3 fw-semibold">Setting</p>
<nav class="navbar navbar-expand-lg bg-body-white nav-underline shadow-sm p-3">
    <a href="/seting-profil-admin" class="profile text-decoration-none text-black nav-link {{ request()->is('seting-profil-admin*') ? 'active' : ''   }}">Profile</a>
    <a href="/seting-toko-admin" class="toko text-decoration-none ms-5 text-black nav-link {{ request()->is('seting-toko-admin*') ? 'active' : ''   }}">Toko</a>
</nav>