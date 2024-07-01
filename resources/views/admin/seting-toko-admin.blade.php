@extends('template.admin')

@section('title', 'Seting admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('components.sidebar-admin')
        <div class="col-md kolom-kanan m-3">
            @include('components.navbar-seting-admin')
            <form action="/seting-toko-admin/update" method="post" class="toko mt-5 shadow-sm p-3 ps-4 rounded mb-5" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                @foreach($dataToko as $item)
                <div class="d-flex mb-5">
                    <p>Logo Toko</p>
                    <input class="form-control" type="file" name="logo_toko1">
                </div>

                <div class="d-flex mb-5">
                    <p>Banner 1</p>
                    <input class="form-control" type="file" name="baner1">
                </div>

                <div class="d-flex mb-5">
                    <p>Banner 2</p>
                    <input class="form-control" type="file" name="baner2">
                </div>

                <div class="d-flex mb-5">
                    <p>Banner 3</p>
                    <input class="form-control" type="file" name="baner3">
                </div>
                
                <div class="d-flex mb-5">
                    <p>Foto Owner</p>
                    <input type="file" id="fotoBa" class="form-control" name="foto_ba">
                </div>
                
                <div class="d-flex mb-5">
                    <p>Email Toko</p>
                    <input type="email" id="email" class="form-control" name="email_toko" value="{{$item->email_toko}}" placeholder="masukan email">
                </div>

                <div class="d-flex mb-5">
                    <p>Alamat Toko</p>
                    <textarea name="alamat_toko" class="form-control" cols="100" rows="10">{{$item->alamat_toko}}</textarea>
                </div>
                <div class="d-flex mb-5">
                    <p>Tentang Toko</p>
                    <textarea name="tentang_toko" class="form-control" cols="100" rows="10">{{$item->tentang_toko}}</textarea>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-batal border-danger-subtle col-5 mx-auto fw-semibold">Batal</button>
                    <button type="submit" class="btn btn-simpan col-5 mx-auto fw-semibold">Simpan</button>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection