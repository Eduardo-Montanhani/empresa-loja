@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Paciente</h2>

    <form action="{{ route('pacientes.update', $paciente['id']) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ $paciente['nome'] }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" value="{{ $paciente['email'] }}" required>
        </div>
        <div class="mb-3">
            <label>CPF</label>
            <input name="cpf" class="form-control" value="{{ $paciente['cpf'] }}" required>
        </div>
         <div class="mb-3">
            <label>Telefone:</label>
            <input name="telefone" class="form-control" value="{{ $paciente['telefone'] }}" required>
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
