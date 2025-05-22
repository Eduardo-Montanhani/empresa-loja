<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthJava
{
    public function handle(Request $request, Closure $next): RedirectResponse | \Symfony\Component\HttpFoundation\Response
    {
        if (!$request->session()->has('jwt_token')) {
            return redirect()->route('login');
        }

        return $next($request);  // aqui retorna o response correto
    }
}

