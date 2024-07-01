<?php

namespace App\Http\Controllers;

use App\Models\user2;
use App\Models\countLogin; // Import model countLogin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('login.login');
        }
    }

    public function prosesLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Tambahkan logika untuk menambahkan countLogin
            $countLogin = countLogin::where('id_user', $user->id)->first();

            if ($countLogin) {
                $countLogin->countLogin += 1;
                $countLogin->save();
            } else {
                $countLogin = new countLogin();
                $countLogin->id_user = $user->id;
                $countLogin->countLogin = 1;
                $countLogin->save();
            }

            // Periksa peran pengguna
            if ($user->role == 'admin') {
                return redirect('/dashboard-admin');
            } elseif ($user->role == 'user') {
                return redirect('/');
            }
        } else {
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
