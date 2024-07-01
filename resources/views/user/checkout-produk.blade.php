@extends('template.main')

@section('title', 'Checkout-produk')

@section('custom-css')
<link href="{{ asset('assets/css/checkout.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid mt-4 mb-5">
    <div class="alamat row shadow-sm ps-4 pt-1 pe-4 pb-4 ms-1 me-1 rounded">
        <div class="tambah-alamat col">
            <div class="d-flex">
                <i class="bi bi-geo-alt fs-3 me-3" style="color: #FF77E9;"></i>
                <p class="fs-4">Alamat Pengiriman</p>
            </div>
            <div class="link">
                <p>{{ $dataUser->alamat_user }}</p>
                <a href="" class="text-decoration-none" style="color: #FF77E9;">Tambah Alamat Baru</a>
            </div>
        </div>
    </div>
    <!-- Bagian Produk Dipesan -->
    <table class="table shadow-sm ps-4 pt-1 pe-4 pb-4 ms-1 me-1 mt-4 rounded">
        <thead>
            <tr>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataKeranjang as $item)
            <tr>
                <td class="d-flex align-items-center">
                    <img src="{{asset('assets/imgProduks/'.$item->gambar_produk)}}" alt="" style="width: 8rem; height: 8rem;">
                </td>
                <td class="fs-6">{{ $item->nama_produk }}</td>
                <td class="fs-6">Rp {{ number_format($item->harga_produk, 0, '.', '.') }}</td>
                <td class="fs-6">{{ $item->kuantitas }}</td>
                <td class="fs-6">Rp {{ number_format($item->harga_kuantitas, 0, '.', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row mt-4 shadow-sm ps-4 pt-1 pe-4 pb-4 ms-1 me-1 rounded">
        <div class="opsi-pengiriman">
            <p class="fs-4">Opsi Pengiriman</p>
            <select class="form-select" aria-label="Default select example" name="pengiriman">
                <option value="1">Hemat</option>
                <option value="2">Cepat</option>
                <option value="3">Chargo</option>
            </select>
            <div class="d-flex justify-content-between mt-3">
                <p class="fs-6">Akan diterima pada tanggal 15-16 Okt</p>
                <p class="fs-6">Rp15.000</p>
            </div>
        </div>
    </div>
    <div class="w-100 mt-4 shadow-sm ps-4 pt-1 pe-4 pb-4 ms-1 me-1 rounded">
        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" value="dana">
        <label class="btn py-3" style="width: 10%;" for="option1"><img src="{{ asset('assets/images/dana.png') }}" class="w-100" alt=""></label>

        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" value="bri">
        <label class="btn py-0" style="width: 10%;" for="option2"><img src="{{ asset('assets/images/bri.png') }}" class="w-100"  alt=""></label>

        <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" value="bca">
        <label class="btn py-2" style="width: 10%;" for="option3"><img src="{{ asset('assets/images/bca.png') }}" class="w-100"  alt=""></label>
    </div>
    <div class="card border-0 shadow-sm mt-4 ms-auto" style="width: 30rem;">
        @php
            $subtotal = 0;
        @endphp

        @foreach($dataKeranjang as $item)
        @php
            $subtotal += $item->harga_kuantitas;
        @endphp
        @endforeach

        <div class="card-body d-flex justify-content-between">
            <p class="fw-semibold">Subtotal</p>
            <p class="fw-semibold">Rp {{ number_format($subtotal, 0, '.', '.') }}</p>
        </div>
        <div class="card-body d-flex justify-content-between">
            <p class="fw-semibold">Diskon</p>
            <p class="fw-semibold">0</p>
        </div>
        <form action="{{ route('proses-order') }}" method="post">
            @csrf
            <div class="card-body d-flex justify-content-between">
                <p class="fw-semibold">Ongkos kirim</p>
                <p class="fw-semibold">Rp15.000</p>
                <input type="hidden" name="ongkir" id="ongkir" value="15000">
            </div>
            <hr class="ms-3 me-3 border border-1 border-black">
            <div class="card-body d-flex justify-content-between">
                <p class="fs-4" style="color: #FF77E9;">Total</p>
                <p class="fw-semibold">Rp {{ number_format($subtotal + 15000, 0, '.', '.') }}</p>
                <input type="hidden" name="total_harga" id="total_harga" value="{{ $subtotal + 15000 }}">
            </div>
            <button type="submit" class="btn me-3 ms-3 mb-3" style="background-color: #FF77E9; color: #fff;">Buat Pesanan</button>
        </form>
    </div>
</div>
@endsection