@extends('template.main')

@section('title', 'Alamat user')

@section('custom-css')
    <link href="{{ asset('assets/css/profil.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3 kolom-kiri">
            @include('components.sidebar-profil-user')
        </div>
        <div class="col-md-9 kolom-kanan">
            <form action="" method="" class="profil shadow-sm p-3 ps-4 rounded mb-5">
                <p class="fs-3 fw-bold">TAMBAH ALAMAT</p>
                <div class="row mb-3">
                    <p class="fw-semibold">Label Alamat</p>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Rumah
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Kantor
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama" class="form-label fw-semibold">Nama Penerima</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="col">
                        <label for="no_hp" class="form-label fw-semibold">No Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_lengkap" class="form-label fw-semibold">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="negara" class="form-label fw-semibold">Negara</label>
                        <input type="text" class="form-control" id="negara" name="negara">
                    </div>
                    <div class="col">
                        <label for="provinsi" class="form-label fw-semibold">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="kabupaten" class="form-label fw-semibold">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten" name="kabupaten">
                    </div>
                    <div class="col">
                        <label for="kecamatan" class="form-label fw-semibold">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="kelurahan" class="form-label fw-semibold">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                    </div>
                </div>
                <div class="row mt-3 mb-2 align-items-center">
                    <button type="submit" class="btn btn-batal border-danger-subtle col-5 mx-auto fw-semibold">Batal</button>
                    <button type="submit" class="btn btn-simpan col-5 mx-auto fw-semibold">Simpan</button>
                </div>
            </form>
            <div class="alamat shadow-sm p-3 ps-4 rounded mb-5">
                <p class="fw-bold fs-4" style="color: #FA2D93;">Alamat Saya</p>
                <div class="row">
                    <div class="col">
                        <p class="fw-semibold mb-0">Puja Ayu Trisnanda | 089727043629</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Gadingan Sliyeg Kab. Indramayu Jawa Barat</p>
                    </div>
                </div>
                <a href="" class="btn btn-ubah" style="border: 1px solid #FA2D93; color:#FA2D93;">Ubah</a>
                <a href="" class="btn btn-hapus" style="border: 1px solid #FA2D93; color:#FA2D93;">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endsection