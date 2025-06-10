<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // Cek apakah user sudah login
            if (auth::check() && auth::user()->role === 'admin') {
            // User adalah admin, lanjutkan request
            return $next($request);
            }
            // Jika bukan admin, tolak akses dengan status 403 Forbidden
            abort(403, 'Akses ditolak. Hanya admin yang boleh.');
                }
}
