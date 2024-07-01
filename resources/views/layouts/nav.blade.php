<nav class="navbar navbar-example2 navbar-expand-lg nav-underline">
  @foreach($dataToko as $item)
  <div class="container-fluid">
    <a class="navbar-brand ms-3" href="/"><img src="{{asset('assets/images/'.$item->logo_toko)}}" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto"> <!-- Menambahkan kelas ms-auto -->
        <li class="nav-item">
          <a class="nav-link me-3 {{ request()->is('home*','/') ? 'active' : ''   }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item dropdown no-border">
          <a class="nav-link dropdown-toggle me-3 {{ request()->is('produk-kategori*') ? 'active' : ''   }}" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
          <ul class="dropdown-menu border-0">
            <li><a class="dropdown-item" href="/semua">Semua</a></li>
            <li><a class="dropdown-item" href="/perawatan-badan">Perawatan Badan</a></li>
            <li><a class="dropdown-item" href="perawatan-wajah">Perawatan Wajah</a></li>
            <li><a class="dropdown-item" href="perawatan-rambut">Perawatan Rambut</a></li>
            <li><a class="dropdown-item" href="parfum">Parfum</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3" href="#tentang-kami">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#kontak-kami">Kontak Kami</a>
        </li>
      </ul>
      <form class="me-3" role="search">
        <input class="form-control form-control-sm border-0 focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2" type="search" placeholder="Cari produk" aria-label="Search">
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/profil"><i class="bi bi-person-fill fs-4"></i></a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-current="page" href="{{ Auth::check() ? '#' : '/login' }}">
            <i class="bi bi-cart4 fs-4 position-relative">
              @if(Auth::check())
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1" style="font-size: 13px; width: 1.6em; height: 1.6em;">
                {{ count($dataKeranjang) }}
              </span>
              @endif
            </i>
          </a>
        </li>
      </ul>
    </div>
  </div>
  @endforeach
</nav>