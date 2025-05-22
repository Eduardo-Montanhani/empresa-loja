@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-5 fw-bold">Sistema Médico</h1>

  <div class="row justify-content-center g-4">

    <!-- Consultas -->
    <div class="col-12 col-md-4">
      <a href="{{ route('consultas.index') }}" class="text-decoration-none">
        <div class="card text-center p-4 h-100 shadow rounded-4"
             style="cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <i class="bi bi-journal-medical display-1 text-primary"></i>
          <h4 class="mt-3 text-primary">Consultas</h4>
          <p class="text-muted">Agende e gerencie suas consultas médicas.</p>
        </div>
      </a>
    </div>

    <!-- Médicos -->
    <div class="col-12 col-md-4">
      <a href="{{ route('medicos.index') }}" class="text-decoration-none">
        <div class="card text-center p-4 h-100 shadow rounded-4"
             style="cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <i class="bi bi-person-badge display-1 text-success"></i>
          <h4 class="mt-3 text-success">Médicos</h4>
          <p class="text-muted">Gerencie os médicos cadastrados no sistema.</p>
        </div>
      </a>
    </div>

    <!-- Pacientes -->
    <div class="col-12 col-md-4">
      <a href="{{ route('pacientes.index') }}" class="text-decoration-none">
        <div class="card text-center p-4 h-100 shadow rounded-4"
             style="cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <i class="bi bi-people display-1" style="color:#6610f2;"></i>
          <h4 class="mt-3" style="color:#6610f2;">Pacientes</h4>
          <p class="text-muted">Gerencie os dados dos pacientes.</p>
        </div>
      </a>
    </div>

  </div>
</div>

<script>
  // Efeito hover para elevar cards (opcional)
  document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('mouseenter', () => {
      card.style.transform = 'translateY(-8px)';
      card.style.boxShadow = '0 12px 24px rgba(0,0,0,0.15)';
    });
    card.addEventListener('mouseleave', () => {
      card.style.transform = 'none';
      card.style.boxShadow = '';
    });
  });
</script>
@endsection
