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
        <h4>{{$alumno->nombre}} {{$alumno->apellido}}</h4>
        <h5>{{$alumno->NumeroCuenta}}</h5>
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
                @foreach($clasesHistorialArray as $claseHistorial)
                <tr>
                    <td>{{$claseHistorial['clase']['nombre']}}</td>
                    <td>{{$claseHistorial['calificacion']}}</td>
                    <td>{{$claseHistorial['estado']['nombre']}}</td>
                    <td>{{$claseHistorial['periodo']['ano']}} - {{$claseHistorial['periodo']['numeroPeriodo']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
        <button id="downloadPdf" class="btn btn-secondary mt-4">Descargar en PDF</button>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <script>
        document.getElementById('downloadPdf').addEventListener('click', function(){
            const contenido = document.body
            html2pdf().from(contenido).set({
                margin:1,
                filename: 'historial.pdf',
                html2canvas: {scale: 2},
                jsPDF: {orientation: 'portrait'}
            }).save();
        });
    </script>
</body>
</html>
