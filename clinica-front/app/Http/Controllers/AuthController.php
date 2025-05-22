<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'senha' => 'required'
        ]);

        $response = Http::post(env('JAVA_API_URL') . '/auth/login', [
            'username' => $request->username,
            'senha' => $request->senha,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            session([
                'jwt_token' => $data['token'],
                'username' => $data['username'],
                'role' => $data['role']
            ]);
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Usuário ou senha inválidos.']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
