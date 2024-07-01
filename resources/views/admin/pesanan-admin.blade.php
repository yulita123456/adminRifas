@extends('template.admin')

@section('title', 'Daftar pesanan')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('components.sidebar-admin')
    <div class="col-md kolom-kanan">
      <nav class="navbar navbar-expand-lg bg-body-tertiary mt-3">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <nav class="navbar navbar-expand-lg bg-body-tertiary nav-underline">
              <a class="nav-link ms-4 {{ request()->is('pesanan-admin') ? 'active' : ''   }}" aria-current="page" href="{{ route('pesananAdmin.semua') }}">Semua Pesanan</a>
              <a class="nav-link ms-4 {{ request()->is('pesanan-admin-baru') ? 'active' : ''   }}" href="{{ route('pesananAdmin.baru') }}">
                Pesanan Baru
                @if(count($dataOrderBaru) > 0)
                <span class="badge bg-warning rounded-circle">Baru</span>
                @endif
              </a>
              <a class="nav-link ms-4 {{ request()->is('pesanan-admin-dikemas') ? 'active' : ''   }}" href="{{ route('pesananAdmin.dikemas') }}">Sedang Dikemas</a>
              <a class="nav-link ms-4 {{ request()->is('pesanan-admin-siap-diambil') ? 'active' : ''   }}" href="{{ route('pesananAdmin.siap-diambil') }}">Sedang Dikirim</a>
              <a class="nav-link ms-4 {{ request()->is('pesanan-admin-selesai') ? 'active' : ''   }}" href="{{ route('pesananAdmin.selesai') }}">Pesanan Selesai</a>
              <a class="nav-link ms-4 {{ request()->is('pesanan-admin-dibatalkan') ? 'active' : ''   }}" href="{{ route('pesananAdmin.dibatalkan') }}">Dibatalkan</a>
              <form class="d-flex" role="search">
            </nav>
          </div>
        </div>
      </nav>
      <div class="d-flex">
        <input class="form-control me-3 mt-2" type="search" placeholder="Cari di sini" aria-label="Search">
        <div class="col-auto mt-2">
          <label class="visually-hidden" for="autoSizingSelect">Preference</label>
          <select class="form-select" id="autoSizingSelect">
            <option selected>Urutkan...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
      @foreach($dataOrder as $item)
      <div class="isi-pesanan-ada mt-3 shadow-sm p-3 rounded">
        <div class="status-pesanan d-flex justify-content-between">
          <p class="fw-medium">Pesanan No.{{ $item->id_pesanan }}</p>
          <p class="fw-medium">{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->format('d F Y H.i') }}</p>
          <p class="fw-semibold">{{ $item->status }}</p>
        </div>
        <div class="detail-pesanan d-flex lh-1">
          <img src="{{asset('assets/imgProduks/'.$item->gambar_produk)}}" alt="" style="width: 10rem; height: 10rem;">
          <div class="nama-produk harga">
            <p class="fw-medium">{{ $item->nama_produk }}</p>
            <p class="fw-medium">{{ $item->kuantitas }}</p>
            <p class="fw-medium">Rp {{ number_format($item->harga_produk, 0, '.', '.') }}</p>
          </div>
        </div>
        <div class="konfirm-pesanan text-end">
          @if($item->status == "Belum bayar" || $item->status == "Sudah bayar")
          <a class="btn btn-outline-secondary" href="{{ route('terima-pesanan', $item->id_pesanan)}}">Terima</a>
          <a class="btn btn-secondary" href="{{ route('tolak-pesanan', $item->id_pesanan) }}">Tolak</a>
          @elseif($item->status == "Dikemas")
          <a class="btn btn-secondary" href="{{ route('pesanan-siap', $item->id_pesanan) }}">Siap Dikirim</a>
          @endif
        </div>
        <p class="fw-medium fs-5 text-end">Total Rp {{ number_format($item->harga_produk, 0, '.', '.') }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
@endsection