<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\keranjang;
use App\Models\toko;
use Illuminate\Support\Facades\View;

class DataShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['user.pesanan-user', 'user.profil-user'], function ($view) {
            $id_user = Auth::id();
            $dataKeranjang = keranjang::where('id_user', $id_user)->get();
            $dataToko = toko::all();

            $view->with('dataToko', $dataToko);
            $view->with('dataKeranjang', $dataKeranjang);
        });
    }
}
