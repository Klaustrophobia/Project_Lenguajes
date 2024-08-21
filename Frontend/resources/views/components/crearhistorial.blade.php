<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Historial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Creacion Codigo Historial</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('crearhistorial.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Seleccione el Alumno</label>
                <select name="numeroCuenta" id="numeroCuenta">
                    @foreach($alumnos as $alumno)
                    <option value="{{$alumno['numeroCuenta']}}">{{$alumno['nombre']}} {{$alumno['apellido']}} Numero de Cuenta: {{$alumno['numeroCuenta']}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="apellido">Codigo</label>
                    <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Ingrese el codigo" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Crear Historial</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
        </form>
    </div>
</body>
</html>
