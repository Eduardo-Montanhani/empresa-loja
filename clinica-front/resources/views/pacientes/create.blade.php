@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Cadastrar Paciente</h2>

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>CPF</label>
            <input name="cpf" class="form-control" required>
        </div>
         <div class="mb-3">
            <label>Telefone:</label>
            <input name="telefone" class="form-control" required>
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
