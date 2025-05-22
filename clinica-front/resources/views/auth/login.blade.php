<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Clínica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #4d7cab, #81b3d2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-wrapper {
            background: #ffffff;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 60px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-wrapper h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .icon-heart {
            font-size: 48px;
            color: #dc3545;
            display: block;
            text-align: center;
            margin-bottom: 10px;
            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .form-control {
            border-radius: 10px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(77, 124, 171, 0.3);
            border-color: #4d7cab;
        }

        .btn-login {
            background-color: #4d7cab;
            border: none;
            border-radius: 12px;
            padding: 10px 0;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #3c6a99;
        }

        .alert-danger {
            font-size: 0.9rem;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }

        .input-group-text {
            background-color: #f1f1f1;
            border: none;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <i class="bi bi-heart-pulse-fill icon-heart"></i>
        <h2>Entrar na Clínica</h2>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Usuário</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="username" id="username" required autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" name="senha" id="senha" required>
                </div>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-login">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>
