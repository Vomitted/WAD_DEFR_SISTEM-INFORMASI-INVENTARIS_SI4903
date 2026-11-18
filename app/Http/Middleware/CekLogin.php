<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login')
                ->with('success', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
