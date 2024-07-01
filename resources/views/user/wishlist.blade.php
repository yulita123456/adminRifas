@extends('template.main')

@section('title', 'Produk favorit')

@section('custom-css')
<link href="{{ asset('assets/css/pesanan.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3 kolom-kiri">
            @include('components.sidebar-profil-user')
        </div>
        <div class="col-md-9 kolom-kanan">
            <div class="daftar-wishlist shadow-sm pt-1 pe-4 ps-4 pb-4">
                <form class="mb-4 mt-5 p-1 border border-secondary-subtle rounded" role="search">
                    <input class="form-control form-control-sm border-0 focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2" type="search" placeholder="Cari produk" aria-label="Search">
                </form>
                <div class="produk-favorit">
                    <div class="row mb-4">
                        @foreach($dataWishlist as $item)
                        <div class="col-3 mb-4">
                            <div class="card">
                                <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}">
                                    <img src="{{ asset('assets/imgProduks/'.$item->gambar_produk) }}" class="card-img-top" height="200px" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="{{ route('hapus.wishlist', $item->id_wishlist) }}">
                                        <i class="bi bi-heart fs-4" style="color: red;"></i>
                                    </a>
                                    <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}" class="text-decoration-none">
                                        <p class="card-title fw-semibold text-black">{{ $item->nama_produk }}</p>
                                        <p class="card-text text-dark text-truncate" style="font-size:smaller;">{{ $item->deskripsi_produk }}</p>
                                    </a>
                                    <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}" class="text-decoration-none">
                                        <p class="card-text text-dark fs-5 fw-semibold">{{ number_format($item->harga_produk, 0, '.', '.') }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection