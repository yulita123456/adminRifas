<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;


class kategoriProdukController extends Controller
{

    public function index()
    {
        $dataProduk = produk::all();
        $dataKategori = "Semua Produk";

        return view('user.produk-kategori', compact('dataProduk', 'dataKategori'));
    }

    public function perawatanBadan()
    {
        $dataProduk = produk::where('kd_kategori', 'PRBDN')->get();
        $dataKategori = "Produk Perawatan Badan";

        return view('user.produk-kategori', compact('dataProduk', 'dataKategori'));
    }

    public function perawatanWajah()
    {
        $dataProduk = produk::where('kd_kategori', 'PRWJH')->get();
        $dataKategori = "Produk Perawatan Wajah";

        return view('user.produk-kategori', compact('dataProduk', 'dataKategori'));
    }

    public function perawatanRambut()
    {
        $dataProduk = produk::where('kd_kategori', 'PRRBT')->get();
        $dataKategori = "Produk Perawatan Rambut";

        return view('user.produk-kategori', compact('dataProduk', 'dataKategori'));
    }

    public function parfum()
    {
        $dataProduk = produk::where('kd_kategori', 'PRFM')->get();
        $dataKategori = "Produk Parfum";

        return view('user.produk-kategori', compact('dataProduk', 'dataKategori'));
    }


    // untuk update produk sesuai ceckbox yg diceklis
    public function updateCategories(Request $request)
    {
        $selectedCategories = $request->input('categories', []);

        // Logika untuk mengembalikan produk berdasarkan kategori yang dipilih
        $dataProduk = produk::whereIn('kd_kategori', $selectedCategories)->get();

        return view('user.produk-kategori', compact('dataProduk'));
    }
}
