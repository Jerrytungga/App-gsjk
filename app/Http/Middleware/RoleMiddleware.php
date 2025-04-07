<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek jika session role tidak ada atau tidak sesuai
        if (Session::get('role') !== $role) {
            return redirect()->route('halaman_login'); // Ganti 'login' dengan route login Anda
        }
        // Jika role sesuai, lanjutkan request
        return $next($request);
    }
}