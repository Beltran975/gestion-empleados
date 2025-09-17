<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('usuario_id') && !$request->is('login')) {
            return redirect()->route('login');
        }
        
        if ($request->session()->has('usuario_id') && $request->is('login')) {
            return redirect()->route('empleados.index');
        }

        return $next($request);
    }
}
