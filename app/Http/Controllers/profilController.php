<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function index()
    {
        return view('user.profil-user');
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => $request->filled('password') ? $request->password : $user->password,
        ]);
        return redirect()->back();
    }
}
