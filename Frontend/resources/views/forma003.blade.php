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
        <p>Cuenta: {{ $alumno->NumeroCuenta }}</p>
        <!-- Agrega más detalles según la estructura de la Forma 003 -->

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
