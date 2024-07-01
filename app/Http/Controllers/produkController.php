<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\order;
use App\Models\produk;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
        // Untuk membuat notifikasi di bagian pesanan yang mana dataOrderBarunya akan dicount
        public function __construct()
        {
            $dataOrderBaru = order::whereIn('status', ['Sudah bayar', 'Belum bayar'])->get();
    
            view()->share('dataOrderBaru', $dataOrderBaru);
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProduk = produk::join('kategori', 'produk.kd_kategori', '=', 'kategori.kd_kategori')
                            ->simplePaginate(5); // Menampilkan 6 produk per halaman
    
        return view('admin.produk-admin', compact('dataProduk'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataKategori = kategori::all();
        return view('admin.tambah-produk', compact('dataKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Tangani unggah file
        if ($request->hasFile('gambar_produk')) {
            $image = $request->file('gambar_produk');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/imgProduks'), $imageName);
        }

        // Simpan data produk di database
        $result = produk::insert([
            'nama_produk' => $request->nama_produk,
            'kd_kategori' => $request->kategori_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'gambar_produk' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($result) {
            return redirect('/produk-admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataProduk = produk::join('kategori', 'produk.kd_kategori', '=', 'kategori.kd_kategori')
            ->where('id_produk', '=', $id)
            ->first();
        $dataKategori = kategori::all();
        return view('admin.edit-produk', compact('dataProduk', 'dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi permintaan
        $request->validate([
            'gambar_produk' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = produk::find($id);

        if ($request->hasFile('gambar_produk')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar_produk) {
                Storage::delete('assets/imgProduks/' . $produk->gambar_produk);
            }

            // Proses unggah file baru
            
            $image = $request->file('gambar_produk');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/imgProduks'), $imageName);

            // Update nama gambar di database
            $produk->update(['gambar_produk' => $imageName]);
        }

        // Update data produk di database
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'kd_kategori' => $request->kategori_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);

        return redirect('/produk-admin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = produk::where('id_produk', $id)->first();
        // Hapus gambar jika ditemukan atau ada
        if ($produk->gambar_produk) {
            Storage::delete('assets/imgProduks/' . $produk->gambar_produk);
        }
        $produk->delete();
        return redirect('produk-admin');
    }
}
