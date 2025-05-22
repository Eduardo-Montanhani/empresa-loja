@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Médico</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicos.update', $medico['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $medico['nome']) }}" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" name="crm" id="crm" class="form-control" value="{{ old('crm', $medico['crm']) }}" required>
        </div>
        <div class="mb-3">
            <label for="especialidade" class="form-label">Especialidade</label>
            <input type="text" name="especialidade" id="especialidade" class="form-control" value="{{ old('especialidade', $medico['especialidade']) }}" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $medico['telefone']) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $medico['email']) }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
