<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Registro de Secciones</h3>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form id="formAgregarSecciones" method="post">
                            @csrf
                            <div class="form-group">
								<label>Clase</label>
								<select name="clase[codigo]" id="clase[codigo]">
									@foreach($clasesArray as $clase)
									<option value="{{$clase['codigo']}}">{{$clase['codigo']}} {{$clase['nombre']}} </option>
									@endforeach
								</select>
                            </div>
							
                            <div class="form-group">
                                <label>Hora Inicio</label>
								<input type="time" id="horaInicio" name="horaInicio" required>
                            </div>
							
                            <div class="form-group">
                                <label>Hora Fin</label>
								<input type="time" id="horaFin" name="horaFin" required>
                            </div>
							
                            <div class="form-group">
                                <label>Codigo Seccion</label>
								<input type="text" id="codigoSeccion" name="codigoSeccion" required>
                            </div>
							
                            <div class="form-group">
                                <label>Docente</label>
								<select name="docente[idDocente]" id="docente[idDocente]">
									@foreach($docentesArray as $docente)
									<option value="{{$docente['idDocente']}}">Codigo Docente: {{$docente['idDocente']}} Nombre: {{$docente['nombre']}} {{$docente['apellido']}}</option>
									@endforeach
								</select>
                            </div>
							
                            <div class="form-group">
                                <label>Aula</label>
								<select name="aula[idAula]" id="aula[idAula]">
									@foreach($aulasArray as $aula)
									<option value="{{$aula['idAula']}}">Aula: {{$aula['nombre']}} Edificio: {{$aula['edificio']['nombre']}}</option>
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
							
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            </div>
							
							<a href="{{ route('dashboarddocente') }}" class="btn btn-secondary mt-4">Regresar al Dashboard</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById('formAgregarSecciones').addEventListener('submit', function(event){
        event.preventDefault();

        const formData = new FormData(this);

        const data = Object.fromEntries(formData.entries());
        
        //VALIDA SI EL INPUT DE CLASE REQUISITO ESTA VACIO
            const jsonData = {
                clase:{
                    codigo:data['clase[codigo]']
                },
                horaInicio: data.horaInicio,
                horaFin: data.horaFin,
                codigoSeccion: data.codigoSeccion,
                docente:{
                    idDocente: data['docente[idDocente]']
                },
                aula:{
                    idAula: data['aula[idAula]']
                },
                periodo:{
                    idPeriodo: data['periodo[idPeriodo]']
                }
            };
        


        console.log(jsonData);

        //USA LA RUTA PARA GUARDAR
        fetch('{{route('agregarsecciones.post')}}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error: ',error));
    });

</script>
</html>
