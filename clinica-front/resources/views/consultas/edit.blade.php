@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Consulta</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('consultas.update', $consulta['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente['id'] }}" {{ $paciente['id'] == $consulta['paciente']['id'] ? 'selected' : '' }}>
                        {{ $paciente['nome'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select name="medico_id" id="medico_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico['id'] }}" {{ $medico['id'] == $consulta['medico']['id'] ? 'selected' : '' }}>
                        {{ $medico['nome'] }} - {{ $medico['especialidade'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dataHora" class="form-label">Data e Hora</label>
            <input type="datetime-local" name="dataHora" id="dataHora" class="form-control"
                value="{{ date('Y-m-d\TH:i', strtotime($consulta['dataHora'])) }}" required>
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control">{{ $consulta['observacoes'] }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
