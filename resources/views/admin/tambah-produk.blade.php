@extends('template.admin')

@section('title', 'Produk admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('components.sidebar-admin')
        <div class="col-md kolom-kanan">
            <form action="/produk-admin/store" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 mt-3">
                {{ csrf_field() }}
                <!-- Informasi Produk -->
                <label for="disabledTextInput" class="form-label mb-3 fs-4">Informasi Produk</label>
                <fieldset>
                    <div class="mb-3 row">
                        <label for="disabledTextInput" class="form-label col-sm-2">Nama Produk</label>
                        <div class="col-sm-9 position-relative">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Masukan nama produk" name="nama_produk">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label col-sm-2">Kategori Produk</label>
                        <div class="col-sm-9">
                            <select class="form-select" aria-label="Default select example" name="kategori_produk">
                                <option value="">Pilih kategori</option>
                                @foreach($dataKategori as $item)
                                <option value="{{ $item->kd_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>

                <!-- Detail Produk -->
                <fieldset>
                    <div class="mb-3 row mt-3">
                        <label for="disabledTextInput" class="form-label col-sm-2">Gambar Produk</label>
                        <input type="file" id="fileInputgambar" name="gambar_produk">
                    </div>
                    <div class="mb-3 row mt-3">
                        <div class="mb-3 row">
                            <label for="disabledTextInput" class="form-label col-sm-2">Deskripsi Produk</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Deskripsi produk" id="floatingTextarea2" style="height: 100px" name="deskripsi_produk"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Harga dan Stok Produk -->
                <fieldset>
                    <div class="mb-3 row">
                        <label for="disabledTextInput" class="form-label col-sm-2 fs-4">Harga dan Stok Produk</label>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label col-sm-2">Harga Produk</label>
                        <div class="col-sm-9 position-relative">
                            <input type="text" class="form-control" placeholder="Rp." name="harga_produk">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label col-sm-2">Stok Produk</label>
                        <div class="col-sm-9 position-relative">
                            <input type="text" class="form-control" placeholder="0" name="stok_produk">
                        </div>
                    </div>
                </fieldset>

                <!-- Buttons -->
                <div class="row mt-3">
                    <div class="col-auto ms-auto">
                        <a href="/produk-admin" class="btn btn-primary btn-sm">Batal</a>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection