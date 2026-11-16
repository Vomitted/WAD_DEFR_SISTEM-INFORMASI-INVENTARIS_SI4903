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
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Silakan login terlebih dahulu.'], 401);
            }

            return redirect()->guest(route('login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
