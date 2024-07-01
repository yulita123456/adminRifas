<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index()
    {
        return view('login.registrasi');
    }

    public function prosesRegister(Request $request)
    {

        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string',
            'password' => 'required|string|min:8',
            'captcha' => 'required|captcha',
        ]);
    
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_hp = $request->no_hp;
        $user->password = bcrypt($request->password);
        $user->role = "user";
    
        $user->save();
    
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    
}
