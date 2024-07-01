<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            // Cek peran pengguna
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard-admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/');
            }
        }

        // Jika tidak, lanjutkan ke rute yang diminta
        return $next($request);
    }
}
