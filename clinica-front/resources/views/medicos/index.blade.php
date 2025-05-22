@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Médicos</h2>

    <a href="{{ route('medicos.create') }}" class="btn btn-success mb-3">Novo Médico</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
            <tr>
                <td>{{ $medico['id'] }}</td>
                <td>{{ $medico['nome'] }}</td>
                <td>{{ $medico['crm'] }}</td>
                <td>{{ $medico['especialidade'] }}</td>
                <td>{{ $medico['telefone'] ?? '-' }}</td>
                <td>{{ $medico['email'] ?? '-' }}</td>
                <td>
                    <a href="{{ route('medicos.edit', $medico['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('medicos.destroy', $medico['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Confirma exclusão?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if (count($medicos) === 0)
            <tr>
                <td colspan="7" class="text-center">Nenhum médico encontrado.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
