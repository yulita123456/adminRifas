<?php

namespace App\Http\Controllers;

use App\Models\lupaPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class lupaPasswordController extends Controller
{
    public function index()
    {
        return view('reset-password.index');
    }



    public function lupaPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'nama_lengkap' => 'required',
        ]);
    
        $token = Str::random(length:64);
    
        $result = lupaPassword::insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);
    
        if ($result) {
            Mail::send('email.lupa-password-email', ['token' => $token, 'nama' => $request->nama_lengkap], function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Reset Password');
            });
    
            // Set pesan sukses ke session
            session()->flash('success', 'Email berhasil dikirim untuk reset password.');
        } else {
            // Set pesan error ke session jika gagal
            session()->flash('error', 'Gagal mengirim email untuk reset password. Silakan coba lagi.');
        }
    
        return redirect()->route('lupa.password.index');
    }
    



    public function resetPassword($token)
    {
        return view('reset-password.input-password-baru', compact('token'));
    }



    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8',
        ]);

        $updatePassword = lupaPassword::where([
            'email' => $request->email,
            'token' => $request->token,
        ]);

        if(!$updatePassword){
            return redirect()->route('reset.password');
        }

        User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);


        lupaPassword::where(['email' => $request->email])->delete();

        return redirect('/login');
    }
}
