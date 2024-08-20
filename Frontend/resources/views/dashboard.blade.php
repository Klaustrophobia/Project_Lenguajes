<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, {{ $alumno->nombre }} {{ $alumno->apellido }}</h2>
        <p>Correo: {{ $alumno->Correo }}</p>

        <div class="list-group mt-4">
            <a href="{{route('matricula.index')}}" class="list-group-item list-group-item-action">Matrícula de Clases</a>
            <a href="{{route('historial')}}" class="list-group-item list-group-item-action">Ver Historial Académico</a>
            <a href="{{route('forma03')}}" class="list-group-item list-group-item-action">Ver Forma 003</a>
        </div>
    </div>
</body>
</html>
