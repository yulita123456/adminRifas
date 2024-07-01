<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\produk;
use App\Models\order;
use App\Models\keranjang;


class keranjangController extends Controller
{

    public function tambahKeranjang(Request $request, $id)
    {
        $id_user = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
    
        $produkKeranjang = keranjang::where('id_user', $id_user)
                                        ->where('id_produk', $id)
                                        ->first();
    
        if ($produkKeranjang) {
            // Jika produk yang sama sudah ada di keranjang, maka update datanya
            $produkKeranjang->update([
                'kuantitas' => $produkKeranjang->kuantitas + $request->kuantitas,
                'harga_kuantitas' => $produkKeranjang->harga_produk * ($produkKeranjang->kuantitas + $request->kuantitas),
            ]);
        } else {
            // Jika belum tambahkan ke keranjang
            $dataProduk = produk::find($id);
    
            $keranjang = new keranjang;
            $keranjang->id_user = $id_user;
            $keranjang->nama_user = $name;
            $keranjang->email_user = $email;
            $keranjang->id_produk = $dataProduk->id_produk;
            $keranjang->nama_produk = $dataProduk->nama_produk;
            $keranjang->gambar_produk = $dataProduk->gambar_produk;
            $keranjang->harga_produk = $dataProduk->harga_produk;
            $keranjang->kuantitas = $request->kuantitas;
            $keranjang->harga_kuantitas = $dataProduk->harga_produk * $request->kuantitas;
    
            $keranjang->save();
        }
    
        return redirect()->back();
    }
    

    public function hapusKeranjang($id){
        
        $produkKeranjang = keranjang::find($id);
        $produkKeranjang->delete();

        return redirect()->back();

    }

    public function viewOrder(){

        $dataUser = Auth::user();
        return view('user.checkout-produk', compact('dataUser'));
    }


    public function prosesOrder(Request $request){

        // Mendapatkan data user
        $user = Auth::user();

        $dataKeranjang = keranjang::where('id_user', $user->id)->get();
        foreach ($dataKeranjang as $item) {
            
        $checkout = new order;

        // Mengisi kolom-kolom checkout
        $checkout->id_user = $user->id;
        $checkout->nama_user = $user->name;
        $checkout->email_user = $user->email;
        $checkout->alamat_user = $user->alamat;
        $checkout->id_produk = $item->id_produk;
        $checkout->nama_produk = $item->nama_produk;
        $checkout->gambar_produk = $item->gambar_produk;
        $checkout->harga_produk = $item->harga_produk;
        $checkout->kuantitas = $item->kuantitas;
        $checkout->harga_kuantitas = $item->harga_kuantitas;
        $checkout->ongkir = $request->ongkir;
        $checkout->total_harga = $request->total_harga;
        $checkout->status = "Belum bayar";

        // Menyimpan data checkout
        $checkout->save();

        }

        // Hapus semua item dikeranjang setelah checkout
        keranjang::where('id_user', $user->id)->delete();

        return redirect(route('pesanan.menunggu-konfirmasi'));
    }
    
    

}
