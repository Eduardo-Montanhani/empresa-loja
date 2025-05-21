@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Pacientes</h2>

    <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">Novo Paciente</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nome</th><th>Email</th><th>CPF</th><th>telefone</th><th>acoes</th>
        </thead>
        <tbody>
            @foreach ($pacientes as $p)
            <tr>
                <td>{{ $p['id'] }}</td>
                <td>{{ $p['nome'] }}</td>
                <td>{{ $p['email'] }}</td>
                <td>{{ $p['cpf'] }}</td>
                <td>{{ $p['telefone'] }}</td>
                <td>
                    <a href="{{ route('pacientes.edit', $p['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.destroy', $p['id']) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Confirma exclusão?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
