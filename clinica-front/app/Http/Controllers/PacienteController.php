<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        // Token fixo por enquanto (depois vamos salvar ao fazer login)
        $token = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhZG1pbjIiLCJpYXQiOjE3NDc3OTY1ODQsImV4cCI6MTc0NzgzMjU4NH0.yVVmIdlxt1LfH114WCR9RAkqlrV_m2aBBO1UAIdS8FM"; // <--- Cole aqui o JWT

        $response = Http::withToken($token)
            ->get(env('JAVA_API_URL') . '/pacientes');

        if ($response->successful()) {
            $pacientes = $response->json();
            return view('pacientes.index', compact('pacientes'));
        }

        return abort(500, 'Erro ao buscar pacientes');
    }
}

