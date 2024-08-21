<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 id="numeroCuentaParam">{{$numeroCuenta}}</h1>
    <form action="/agregarnotas/{{$numeroCuenta}}" id="formAgregarClasesHistorial" method="POST">
        @csrf
        <input type="hidden">
        <div class="form-group">
            <label>Clase</label>
            <select name="clase[codigo]" id="clase[codigo]">
                @foreach($clasesArray as $clase)
                <option value="{{$clase['codigo']}}">{{$clase['codigo']}} {{$clase['nombre']}} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Periodo</label>
            <select name="periodo[idPeriodo]" id="periodo[idPeriodo]">
                @foreach($periodosArray as $periodo)
                <option value="{{$periodo['idPeriodo']}}">{{$periodo['numeroPeriodo']}} PAC {{$periodo['ano']}} </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Calificacion</label>
            <input type="text" id="calificacion" name="calificacion" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estado[idEstado]" id="estado[idEstado]">
                @foreach($estadosArray as $estado)
                <option value="{{$estado['idEstado']}}">{{$estado['nombre']}} </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Enviar</button>

    </form>

    
</body>


</html>