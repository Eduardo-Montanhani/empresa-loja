<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MedicoController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('JAVA_API_URL') . '/medicos';
    }

    public function index()
    {
        $response = Http::withToken(session('jwt_token'))->get($this->apiUrl);

        if ($response->successful()) {
            $medicos = $response->json();
            return view('medicos.index', compact('medicos'));
        }

        return back()->withErrors(['api' => 'Erro ao carregar médicos.']);
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => 'required|string|max:50',
            'especialidade' => 'required|string|max:100',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);


        $response = Http::withToken(session('jwt_token'))->post($this->apiUrl, $request->only(['nome', 'crm', 'especialidade', 'telefone', 'email']));


        if ($response->successful()) {
            return redirect()->route('medicos.index')->with('success', 'Médico criado com sucesso!');
        }

        return back()->withErrors(['api' => 'Erro ao criar médico.'])->withInput();
    }

    public function edit($id)
    {
        $response = Http::withToken(session('jwt_token'))->get("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            $medico = $response->json();
            return view('medicos.edit', compact('medico'));
        }

        return redirect()->route('medicos.index')->withErrors(['api' => 'Médico não encontrado.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => 'required|string|max:50',
            'especialidade' => 'required|string|max:100',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);


        $response = Http::withToken(session('jwt_token'))->put("{$this->apiUrl}/{$id}", $request->only(['nome', 'crm', 'especialidade', 'telefone', 'email']));



        if ($response->successful()) {
            return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
        }

        return back()->withErrors(['api' => 'Erro ao atualizar médico.'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::withToken(session('jwt_token'))->delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('medicos.index')->with('success', 'Médico excluído com sucesso!');
        }

        return redirect()->route('medicos.index')->withErrors(['api' => 'Erro ao excluir médico.']);
    }
}
