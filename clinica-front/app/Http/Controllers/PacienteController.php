<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PacienteController extends Controller
{
    private function token()
    {
        return session('jwt_token');
    }

    public function index()
    {

        $pacientes = Pacientes::withCount('consultas')->get();
        $response = Http::withToken($this->token())->get(env('JAVA_API_URL') . '/pacientes');

        if ($response->successful()) {
            $pacientes = $response->json();
            return view('pacientes.index', compact('pacientes'));
        }

        return abort(403, 'Não autorizado');
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('nome', 'email', 'cpf', 'telefone');

        $response = Http::withToken($this->token())->post(env('JAVA_API_URL') . '/pacientes', $data);

        return $response->successful()
            ? redirect()->route('pacientes.index')->with('success', 'Paciente cadastrado com sucesso!')
            : back()->withErrors(['error' => 'Erro ao cadastrar']);
    }

    public function edit($id)
    {
        $response = Http::withToken($this->token())->get(env('JAVA_API_URL') . "/pacientes/{$id}");

        if ($response->successful()) {
            $paciente = $response->json();
            return view('pacientes.edit', compact('paciente'));
        }

        return abort(404, 'Paciente não encontrado');
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('nome', 'email', 'cpf', 'telefone');

        $response = Http::withToken($this->token())->put(env('JAVA_API_URL') . "/pacientes/{$id}", $data);

        return $response->successful()
            ? redirect()->route('pacientes.index')->with('success', 'Paciente atualizado!')
            : back()->withErrors(['error' => 'Erro ao atualizar']);
    }

    public function destroy($id)
    {
        $response = Http::withToken($this->token())->delete(env('JAVA_API_URL') . "/pacientes/{$id}");

        return $response->successful()
            ? redirect()->route('pacientes.index')->with('success', 'Paciente removido!')
            : back()->withErrors(['error' => 'Erro ao excluir']);
    }
}
