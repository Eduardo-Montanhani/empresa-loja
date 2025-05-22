@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><i class="bi bi-calendar-heart"></i> Consultas</h2>
            <a href="{{ route('consultas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Nova Consulta
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">{{ implode(', ', $errors->all()) }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Data e Hora</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta['id'] }}</td>
                            <td>{{ $consulta['paciente']['nome'] ?? '—' }}</td>
                            <td>{{ $consulta['medico']['nome'] ?? '—' }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($consulta['dataHora'])) }}</td>
                            <td class="text-end">
                                <a href="{{ route('consultas.edit', $consulta['id']) }}" class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('consultas.destroy', $consulta['id']) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirma exclusão?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Nenhuma consulta encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
