@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><i class="bi bi-person-hearts"></i> Pacientes</h2>
            <a href="{{ route('pacientes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Novo Paciente
            </a>
        </div>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pacientes as $p)
                    <tr>
                        <td>{{ $p['id'] }}</td>
                        <td>{{ $p['nome'] }}</td>
                        <td>{{ $p['email'] }}</td>
                        <td>{{ $p['cpf'] }}</td>
                        <td>{{ $p['telefone'] }}</td>
                        <td class="text-end">
                            <a href="{{ route('pacientes.edit', $p['id']) }}" class="btn btn-outline-warning btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('pacientes.destroy', $p['id']) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirma exclusão?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum paciente encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
