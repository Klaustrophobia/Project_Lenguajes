<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma 003</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Forma 003</h2>
        <!-- Aquí puedes mostrar los detalles de la forma 003 -->
        <p>Nombre: {{ $alumno->nombre }} {{ $alumno->apellido }}</p>
        <p>Cuenta: {{ $alumno->numeroCuenta }}</p>
        <!-- Agrega más detalles según la estructura de la Forma 003 -->

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
    </div>
</body>
</html>
