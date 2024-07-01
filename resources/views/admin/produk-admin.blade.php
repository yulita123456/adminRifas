@extends('template.admin')

@section('title', 'Produk admin')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('components.sidebar-admin')
    <div class="col kolom-kanan">
      <nav class="navbar navbar-expand-lg bg-body-tertiary nav-underline mt-3">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Produk Aktif</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ms-5" href="#">Produk Habis</a>
              </li>
            </ul>
            <div class="d-flex">
              <input class="form-control me-3" type="search" placeholder="Cari di sini" aria-label="Search">
              <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                <select class="form-select" id="autoSizingSelect">
                  <option selected>Urutkan...</option>
                  <option value="1">Termahal</option>
                  <option value="2">Termurah</option>
                </select>
              </div>
            </div>
          </div>
      </nav>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scopr="col">
              <a href="/produk-admin/create" class="btn btn-success text-decoration-none color-black">
                <i class="bi bi-plus-circle"></i> Tambah Produk
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($dataProduk as $item)
          <tr>
            <th scope="row">
              <img src="{{ asset('assets/imgProduks/'.$item->gambar_produk) }}" alt="" style="max-width: 100px; max-height: 100px; object-fit: cover; object-position: center;">
            </th>
            <td>{{ $item->nama_produk }}</td>
            <td>{{ $item->nama_kategori }}</td>
            <td>{{ number_format($item->harga_produk, 0, '.', '.') }}</td>
            <td>{{ $item->stok_produk }}</td>
            <td>
              <a href="/produk-admin/edit/{{ $item->id_produk }}" class="btn btn-primary">Edit</a>
              <a href="/produk-admin/destroy/{{ $item->id_produk }}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $dataProduk->links() }}
      </div>
    </div>
  </div>
</div>
@endsection