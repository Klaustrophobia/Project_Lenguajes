<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Matrícula de Clases</h2>

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

        <form action="{{ route('matricula.adicionar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Selecciona la Clase</label>
                <select name="clase[codigo]" id="clase[codigo]">
                    @foreach($clases as $clase)
                    <option value="{{$clase['codigo']}}">{{$clase['codigo']}} {{$clase['nombre']}} </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Adicionar Clase</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
        </form>

        <h3 class="mt-5">Clases Matriculadas</h3>
        <ul class="list-group">
            @foreach($matriculas as $matricula)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $matricula['clase']['nombre'] }} - Sección: {{ $matricula['seccion']['codigoSeccion'] }}
                    <form action="{{ route('matricula.cancelar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="seccion_id" value="{{ $matricula['seccion']['idSeccion'] }}">
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
