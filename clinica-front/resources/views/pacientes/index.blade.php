<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Lista de Pacientes</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente['id'] }}</td>
                    <td>{{ $paciente['nome'] }}</td>
                    <td>{{ $paciente['email'] }}</td>
                    <td>{{ $paciente['cpf'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
