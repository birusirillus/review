<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role1, $role2 = null): Response
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            abort(403, 'Unauthorized'); // Jika pengguna tidak login, kembalikan 403
        }

        // Ambil role pengguna yang sedang login
        $userRole = Auth::user()->role;

        // Periksa apakah role pengguna sesuai dengan $role1 atau $role2
        if ($userRole != $role1 && $userRole != $role2) {
            abort(403, 'Forbidden'); 
        }

        // Lanjutkan request jika role sesuai
        return $next($request);
    }
}
