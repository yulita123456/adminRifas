@extends('template.main')

@section('title', 'Produk Kategori')

@section('custom-css')
<link href="{{ asset('assets/css/profil.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col kolom-kanan">
            <div class="produk-kategori">
                <h4 class="mb-3" style="color: #FF69B4">{{ $dataKategori }}</h4>
                <div class="row mb-4">
                    @foreach($dataProduk as $item)
                    <div class="col-2 mb-4">
                        <div class="card">
                            <img src="{{ asset('assets/imgProduks/'.$item->gambar_produk) }}" class="card-img-top" height="200px" alt="...">
                            <div class="card-body">
                                <p class="card-title fw-semibold">{{ $item->nama_produk }}</p>
                                <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}" class="text-decoration-none">
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