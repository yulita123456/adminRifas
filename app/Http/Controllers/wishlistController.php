<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;


class wishlistController extends Controller
{

    public function index()
    {
        $id_user = Auth::user()->id;
        $dataWishlist = wishlist::where('id_user', $id_user)->get();
        return view('user.wishlist', compact('dataWishlist'));
    }

    public function tambahWishlist(Request $request, $id)
    {
        $id_user = Auth::user()->id;
        $name = Auth::user()->name;
        $wishlistProduk = wishlist::where('id_user', $id_user)
                                    ->where('id_produk', $id)
                                    ->first();

        if ($wishlistProduk) {
            $wishlistProduk->delete(); // Hapus dari wishlist jika sudah ada
            return redirect()->back()->with('info', 'Produk dihapus dari wishlist!');
        }

        $dataProduk = produk::find($id);
        
        $wishlist = new wishlist;
        $wishlist->id_user = $id_user;
        $wishlist->nama_user = $name;
        $wishlist->id_produk = $dataProduk->id_produk;
        $wishlist->nama_produk = $dataProduk->nama_produk;
        $wishlist->deskripsi_produk = $dataProduk->deskripsi_produk;
        $wishlist->gambar_produk = $dataProduk->gambar_produk;
        $wishlist->stok_produk = $dataProduk->stok_produk;
        $wishlist->harga_produk = $dataProduk->harga_produk;
        $wishlist->kd_kategori = $dataProduk->kd_kategori;
        
        $wishlist->save();

        return redirect()->back()->with('success', 'Produk ditambahkan ke wishlist!');
    }

    public function hapusWishlist($id)
    {
        $wishlistProduk = wishlist::find($id);
        $wishlistProduk->delete();

        return redirect()->back()->with('success', 'Produk dihapus dari wishlist!');
    }
}
