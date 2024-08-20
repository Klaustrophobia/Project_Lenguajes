<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Docente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, {{ $docente->nombre }} {{ $docente->apellido }}</h2>
        <p>Correo: {{ $docente->Correo }}</p>

        <div class="list-group mt-4">
            <a href="{{route('agregarsecciones')}}" class="list-group-item list-group-item-action">Agregar Secciones</a>
            <a href="{{route('selectalumno')}}" class="list-group-item list-group-item-action">Ingresar Notas</a>
            <a href="{{route('agregarclases')}}" class="list-group-item list-group-item-action">Crear Clases</a>
        </div>
    </div>
</body>
</html>