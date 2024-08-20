<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Bienvenido a la Plataforma de Matrícula</h2>
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary mx-2">Iniciar Sesión como Estudiante</a>
            <a href="{{ route('register') }}" class="btn btn-success mx-2">Registrarse como Estudiante</a>
            <a href="{{ route('logindocente') }}" class="btn btn-info mx-2">Iniciar Sesión como Docente</a>
            <a href="{{route('registerdocente')}}"class="btn btn-secondary mx-2" >Registrarse como Docente</a>
        </div>
    </div>
</body>
</html>
