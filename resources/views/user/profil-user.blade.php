@extends('template.main')

@section('title', 'Profil user')

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
            <div class="profil shadow-sm" style="width: 62rem; height: 20rem;">
                <div class="card border-0" style="width: 62rem; height: 10rem;">
                    <img src="assets/images/background-profil.png" class="card-img-top" alt="..." style="object-fit: cover; width:100%; height:100% ">
                    <div class="card-body d-flex">
                        <div class="foto-profil">
                            <img src="assets/images/foto-cewe.png" class="rounded-circle img-thumbnail" alt="" style="object-fit: cover; width:13rem; height:13rem">
                        </div>
                        <div class="identitas ms-3">
                            <div class="d-flex">
                                <p class="card-text fs-4 fw-semibold">{{ Auth::user()->name }}</p>
                                <i class="bi bi-pencil-square fs-4 fw-bold ms-5" id="editProfil"></i>
                            </div>
                            <p class="card-text fs-6 fw-bold">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('update.profil') }}" method="post" class="profil mt-5 shadow-sm p-3 ps-4 rounded mb-5" id="formEdit" style="display: none;">
                @csrf
                <p class="fs-3 fw-bold">EDIT PROFIL</p>
                <div class="row mb-3">
                    <p class="fw-semibold">Jenis Kelamin</p>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="col">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="no_hp" class="form-label fw-semibold">No Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ Auth::user()->no_hp }}">
                    </div>
                    <div class="col">
                        <label for="tgl_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->tgl_lahir }}">
                    </div>
                </div>
                <div class="kata-sandi p-3 rounded">
                    <p class="fs-3 fw-bold">KATA SANDI</p>
                    <p class="fw-light">Kosongkan jika tidak ingin mengubah sandi</p>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label fw-semibold">Kata sandi</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col">
                            <label for="confir_password" class="form-label fw-semibold">Ulang sandi</label>
                            <input type="password" class="form-control" id="confir_password" name="confir_password">
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-2 align-items-center">
                    <button type="button" class="btn btn-batal border-danger-subtle col-5 mx-auto fw-semibold" id="btnBatal">Batal</button>
                    <button type="submit" class="btn btn-simpan col-5 mx-auto fw-semibold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection