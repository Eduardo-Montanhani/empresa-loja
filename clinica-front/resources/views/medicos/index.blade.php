@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><i class="bi bi-person-badge"></i> Médicos</h2>
            <a href="{{ route('medicos.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Novo Médico
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CRM</th>
                        <th>Especialidade</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicos as $medico)
                        <tr>
                            <td>{{ $medico['id'] }}</td>
                            <td>{{ $medico['nome'] }}</td>
                            <td>{{ $medico['crm'] }}</td>
                            <td>{{ $medico['especialidade'] }}</td>
                            <td>{{ $medico['telefone'] ?? '-' }}</td>
                            <td>{{ $medico['email'] ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('medicos.edit', $medico['id']) }}" class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('medicos.destroy', $medico['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirma exclusão?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Nenhum médico encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
