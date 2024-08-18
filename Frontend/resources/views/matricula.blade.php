<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula de Clases</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Matrícula de Clases</h2>
        <!-- Aquí puedes iterar sobre las clases disponibles para matrícula -->
        <ul class="list-group">
            <!-- Ejemplo: -->
            <li class="list-group-item">Clase 1 - Código: 101</li>
            <li class="list-group-item">Clase 2 - Código: 102</li>
            <li class="list-group-item">Clase 3 - Código: 103</li>
            <!-- Termina el ejemplo -->
        </ul>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
    </div>
</body>
</html>
