@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Consultas</h2>

    <a href="{{ route('consultas.create') }}" class="btn btn-success mb-3">Nova Consulta</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">{{ implode(', ', $errors->all()) }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Data e Hora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>
                <td>{{ $consulta['id'] }}</td>
                <td>{{ $consulta['paciente']['nome'] ?? '—' }}</td>
                <td>{{ $consulta['medico']['nome'] ?? '—' }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($consulta['dataHora'])) }}</td>
                <td>
                    <a href="{{ route('consultas.edit', $consulta['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('consultas.destroy', $consulta['id']) }}" method="POST" style="display:inline;">
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
