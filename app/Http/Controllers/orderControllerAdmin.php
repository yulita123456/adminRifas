<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class orderControllerAdmin extends Controller
{

    // Untuk membuat notifikasi di bagian pesanan yang mana dataOrderBaarunya akan dicount
    public function __construct()
    {
        $dataOrderBaru = order::whereIn('status', ['Sudah bayar', 'Belum bayar'])->get();

        view()->share('dataOrderBaru', $dataOrderBaru);
    }

    public function index()
    {
        $dataOrder = order::all()
                            ->sortByDesc('created_at');

        return view('admin.pesanan-admin', compact('dataOrder'));
    }

    public function pesananBaru()
    {
        $dataOrder = order::whereIn('status', ['Sudah bayar', 'Belum bayar'])
                                    ->get()
                                    ->sortByDesc('created_at');

        return view('admin.pesanan-admin', compact('dataOrder'));

    }

    public function pesananDikemas()
    {
        $dataOrder = order::where('status', 'Dikemas')
                                ->get()
                                ->sortByDesc('created_at');

        return view('admin.pesanan-admin', compact('dataOrder'));
    }

    public function pesananSiapDiAmbil()
    {
        $dataOrder = order::where('status', 'Dikirim')
                                ->get()
                                ->sortByDesc('created_at');

        return view('admin.pesanan-admin', compact('dataOrder'));
    }

    public function pesananSelesai()
    {
        $dataOrder = order::where('status', 'Selesai')
                                ->get()
                                ->sortByDesc('created_at');

        return view('admin.pesanan-admin', compact('dataOrder'));
    }

    public function pesananDibatalkan()
    {
        $dataOrder = order::where('status', 'Dibatalkan')
                                ->get()
                                ->sortByDesc('created_at');

        return view('admin.pesanan-admin', compact('dataOrder'));
    }

    public function pesananDikembalikan()
    {
        $dataOrder = order::where('status', 'Pengembalian')
                                ->get()
                                ->sortByDesc('created_at');
        return view('admin.pesanan-admin', compact('dataOrder'));
    }


    // method untk confirm pesanan user
    public function terimaPesanan($id)
    {
        $dataOrder = order::find($id);
        $dataOrder->status = "Dikemas";
        $dataOrder->save();

        return redirect()->back();
    }

    public function tolakPesanan($id)
    {
        $dataOrder = order::find($id);
        $dataOrder->status = "Dibatalkan";
        $dataOrder->save();

        return redirect()->back();
    }

    public function pesananSiap($id)
    {
        $dataOrder = order::find($id);
        $dataOrder->status = "Dikirim";
        $dataOrder->save();

        return redirect()->back();
    }
}
