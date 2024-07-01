@extends('template.main')

@section('title', 'Pesanan user')

@section('custom-css')
    <link href="{{ asset('assets/css/pesanan.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-3 kolom-kiri">
                @include('components.sidebar-profil-user')
            </div>
            <div class="col-md-9 kolom-kanan ps-4 pt-1 pe-4 pb-4 shadow-sm raunded">
                <div class="alur-pesanan mb-1">
                    <form class="mb-4 mt-5 p-1 border border-secondary-subtle rounded" role="search">
                        <input class="form-control form-control-sm border-0 focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2" type="search" placeholder="Cari pesanan" aria-label="Search">
                    </form>
                    <a class="btn {{ request()->is('pesanan') ? 'active' : ''   }}" href="{{ route('pesanan.semua') }}" role="button">Semua</a>
                    <a class="btn {{ request()->is('pesanan-menunggu-konfirmasi') ? 'active' : ''   }}" href="{{ route('pesanan.menunggu-konfirmasi') }}" role="button">Menunggu Konfirmasi</a>
                    <a class="btn {{ request()->is('pesanan-dikemas') ? 'active' : ''   }}" href="{{ route('pesanan.dikemas') }}" role="button">Dikemas</a>
                    <a class="btn {{ request()->is('pesanan-dikirim') ? 'active' : ''   }}" href="{{ route('pesanan.dikirim') }}" role="button">Dikirim</a>
                    <a class="btn {{ request()->is('pesanan-selesai') ? 'active' : ''   }}" href="{{ route('pesanan.selesai') }}" role="button">Selesai</a>   
                    <a class="btn {{ request()->is('pesanan-dibatalkan') ? 'active' : ''   }}" href="{{ route('pesanan.dibatalkan') }}" role="button">Dibatalkan</a>
                    <a class="btn {{ request()->is('pesanan-dikembalikan') ? 'active' : ''   }}" href="{{ route('pesanan.dikembalikan') }}" role="button">Pengembalian</a>
                </div>
                <div class="produk-list">
                    @forelse($dataOrder as $item)
                    
                    @include('components.pesanan-ada')
                    
                    @empty
                    @include('components.pesanan-kosong')

                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection