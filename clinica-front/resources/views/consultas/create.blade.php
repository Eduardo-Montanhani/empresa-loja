@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Nova Consulta</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
    @endif

    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($pacientes as $paciente)
                <option value="{{ $paciente['id'] }}">{{ $paciente['nome'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select name="medico_id" id="medico_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($medicos as $medico)
                <option value="{{ $medico['id'] }}">{{ $medico['nome'] }} - {{ $medico['especialidade'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dataHora" class="form-label">Data e Hora</label>
            <input type="datetime-local" id="dataHora" name="dataHora" class="form-control"
                value="{{ old('dataHora') ?? \Carbon\Carbon::now()->addHour()->format('Y-m-d\TH:i') }}">
            @error('dataHora')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
