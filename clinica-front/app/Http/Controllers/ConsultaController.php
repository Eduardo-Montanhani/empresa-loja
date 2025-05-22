<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultaController extends Controller
{
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('JAVA_API_URL');  // pega URL da API no .env
    }

    public function index()
    {
        $response = Http::withToken(session('jwt_token'))
            ->get($this->apiBaseUrl . '/consultas');

        if ($response->successful()) {
            $consultas = $response->json();
            return view('consultas.index', compact('consultas'));
        }

        return back()->withErrors('Erro ao buscar consultas');
    }

    public function create()
    {
        // Para criar a consulta, você provavelmente precisa da lista de médicos e pacientes
        $medicos = Http::withToken(session('jwt_token'))
            ->get($this->apiBaseUrl . '/medicos')->json();

        $pacientes = Http::withToken(session('jwt_token'))
            ->get($this->apiBaseUrl . '/pacientes')->json();

        return view('consultas.create', compact('medicos', 'pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|integer',
            'medico_id' => 'required|integer',
            'dataHora' => 'required|date_format:Y-m-d\TH:i',
            'observacoes' => 'nullable|string',
        ]);

        $payload = [
            'dataHora' => $request->dataHora,
            'paciente' => ['id' => $request->paciente_id],
            'medico' => ['id' => $request->medico_id],
            'observacoes' => $request->observacoes,
        ];

        $response = Http::withToken(session('jwt_token'))
            ->post($this->apiBaseUrl . '/consultas', $payload);

        if ($response->successful()) {
            return redirect()->route('consultas.index')->with('success', 'Consulta criada com sucesso.');
        }

        return back()->withErrors('Erro ao criar consulta.');
    }


    public function edit($id)
    {
        $consulta = Http::withToken(session('jwt_token'))
            ->get($this->apiBaseUrl . "/consultas/{$id}")->json();

        $medicos = Http::withToken(session('jwt_token'))
            ->get($this->apiBaseUrl . '/medicos')->json();

        $pacientes = Http::withToken(session('jwt_token'))
            ->get($this->apiBaseUrl . '/pacientes')->json();

        return view('consultas.edit', compact('consulta', 'medicos', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'paciente_id' => 'required|integer',
            'medico_id' => 'required|integer',
            'dataHora' => 'required|date_format:Y-m-d\TH:i',
            'observacoes' => 'nullable|string',
        ]);

        $payload = [
            'dataHora' => $request->dataHora,
            'paciente' => ['id' => $request->paciente_id],
            'medico' => ['id' => $request->medico_id],
            'observacoes' => $request->observacoes,
        ];

        $response = Http::withToken(session('jwt_token'))
            ->put($this->apiBaseUrl . "/consultas/{$id}", $payload);

        if ($response->successful()) {
            return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso.');
        }

        return back()->withErrors('Erro ao atualizar consulta.');
    }


    public function destroy($id)
    {
        $response = Http::withToken(session('jwt_token'))
            ->delete($this->apiBaseUrl . "/consultas/{$id}");

        if ($response->successful()) {
            return redirect()->route('consultas.index')->with('success', 'Consulta excluída com sucesso.');
        }

        return back()->withErrors('Erro ao excluir consulta.');
    }
}
