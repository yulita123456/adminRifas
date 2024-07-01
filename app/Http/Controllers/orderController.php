<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\toko;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\keranjangController;



class orderController extends keranjangController
{
    public function index()
    {
        $user = Auth::user();
        $dataKeranjang = keranjang::where('id_user', $user->id)->get();
        $dataToko = toko::all();
        $dataOrder = order::where('id_user', $user->id)
                                ->get()
                                ->sortByDesc('created_at');
        return view('user.pesanan-user', compact('dataOrder', 'dataToko', 'dataKeranjang'));
    }
    

    public function pesananMenungguKonfirmasi()
    {
        $user = Auth::user();
        $dataToko = toko::all();
        $dataKeranjang = keranjang::where('id_user', $user->id)->get();

        $dataOrder = order::where('id_user', $user->id)
                                ->whereIn('status', ['Belum bayar', 'Sudah bayar'])
                                ->get()
                                ->sortByDesc('created_at');


        return view('user.pesanan-user', compact('dataOrder','dataToko','dataKeranjang'));

    }

    public function pesananDikemas()
    {
        $user = Auth::user();
        $dataToko = toko::all();
        $dataKeranjang = keranjang::where('id_user', $user->id)->get();

        $dataOrder = order::where('id_user', $user->id)
                                ->where('status', 'Dikemas')
                                ->get()
                                ->sortByDesc('created_at');

        return view('user.pesanan-user', compact('dataOrder','dataToko','dataKeranjang'));


    }

    public function pesananDikirim()
    {
        $user = Auth::user();
        $dataToko = toko::all();
        $dataKeranjang = keranjang::where('id_user', $user->id)
                                        ->get()
                                        ->sortByDesc('created_at');

        $dataOrder = order::where('id_user', $user->id)->where('status', 'Dikirim')->get();
        return view('user.pesanan-user', compact('dataOrder','dataToko','dataKeranjang'));


    }

    public function pesananSelesai()
    {
        $user = Auth::user();
        $dataToko = toko::all();
        $dataKeranjang = keranjang::where('id_user', $user->id)
                                        ->get()
                                        ->sortByDesc('created_at');

        $dataOrder = order::where('id_user', $user->id)->where('status', 'Selesai')->get();
        return view('user.pesanan-user', compact('dataOrder','dataToko','dataKeranjang'));


    }

    public function pesananDibatalkan()
    {
        $user = Auth::user();
        $dataToko = toko::all();
        $dataKeranjang = keranjang::where('id_user', $user->id)
                                        ->get()
                                        ->sortByDesc('created_at');

        $dataOrder = order::where('id_user', $user->id)->where('status', 'Dibatalkan')->get();
        return view('user.pesanan-user', compact('dataOrder','dataToko','dataKeranjang'));


    }

    public function pesananDikembalikan()
    {
        $user = Auth::user();
        $dataToko = toko::all();
        $dataKeranjang = keranjang::where('id_user', $user->id)
                                        ->get()
                                        ->sortByDesc('created_at');

        $dataOrder = order::where('id_user', $user->id)->where('status', 'Pengembalian')->get();
        return view('user.pesanan-user', compact('dataOrder','dataToko','dataKeranjang'));


    }

    public function terimaPesanan($id)
    {
        $dataOrder = order::find($id);
        $dataOrder->status = "Selesai";
        $dataOrder->save();

        return redirect()->back();
    }

    public function batalkanPesanan($id)
    {
        $dataOrder = order::find($id);
        $dataOrder->status = "Dibatalkan";
        $dataOrder->save();

        return redirect()->back();
    }
}
