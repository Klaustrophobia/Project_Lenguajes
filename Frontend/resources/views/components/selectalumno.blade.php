<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="form-group">
        <label>Alumno</label>
        <select name="alumno[numeroCuenta]" id="numeroCuenta">
            @foreach($alumnosArray as $alumno)
            <option value="{{$alumno['numeroCuenta']}}">{{$alumno['numeroCuenta']}} - {{$alumno['nombre']}} {{$alumno['apellido']}}</option>
            @endforeach
        </select>
    </div>
    <button id="guardarNumeroCuentabtn">Seleccionar alumno</button>

    <script>
        document.getElementById('guardarNumeroCuentabtn').addEventListener('click',function(){
            var numeroCuenta = document.getElementById('numeroCuenta').value;
            window.location.href = " {{route('agregarnotas')}}" + "?numeroCuenta="+numeroCuenta;
        })
    </script>
</body>
</html>