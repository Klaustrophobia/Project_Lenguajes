<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Académico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Historial Académico</h2>
        <!-- Aquí puedes iterar sobre el historial académico -->
        <table class="table">
            <thead>
                <tr>
                    <th>Clase</th>
                    <th>Calificación</th>
                    <th>Estado</th>
                    <th>Periodo</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ejemplo de historial -->
                <tr>
                    <td>Matemáticas I</td>
                    <td>85</td>
                    <td>Aprobado</td>
                    <td>2023-1</td>
                </tr>
                <tr>
                    <td>Programación</td>
                    <td>90</td>
                    <td>Aprobado</td>
                    <td>2023-1</td>
                </tr>
                <!-- Termina el ejemplo -->
            </tbody>
        </table>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
    </div>
</body>
</html>
