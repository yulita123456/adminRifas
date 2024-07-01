<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\Auth;


class adminController extends Controller
{

    public function __construct()
    {
        $dataOrderBaru = order::whereIn('status', ['Sudah bayar', 'Belum bayar'])->get();
    
        view()->share('dataOrderBaru', $dataOrderBaru);
    }

    public function index()
    {
        $dataAdmin = Auth::user();
        return view('admin.seting-profil-admin', compact('dataAdmin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $admin->update([
            'name' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
            // Mengambil password dari database jika tdk dinput user
            'password' => $request->filled('password') ? $request->password : $admin->password,
        ]);

        return redirect()->back();
    }
}
