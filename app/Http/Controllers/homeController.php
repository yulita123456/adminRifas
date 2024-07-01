<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\wishlist;


class homeController extends Controller
{


    public function index()
    {

        $dataProduk = produk::join(
            'kategori',
            'produk.kd_kategori',
            '=',
            'kategori.kd_kategori'
        )
            ->get();

        return view('user.index', compact('dataProduk'));
    }

    public function show($id)
    {
        $dataProduk = produk::find($id);

        $wishlistProduk = wishlist::all();

        return view('user.deskripsi-produk', compact('dataProduk', 'wishlistProduk'));
    }

}
