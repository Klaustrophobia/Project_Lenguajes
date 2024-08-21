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
                        <h3 class="card-title text-center mb-4">Registro de Clases</h3>

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

                        <form id="formAgregarClases" method="post">
                            @csrf
                            <div class="form-group">
								<label>Nombre</label>
								<input type="text" id="nombre" name="nombre" required>
                            </div>
							
                            <div class="form-group">
                                <label>Unidades Valorativas</label>
								<input type="text" id="unidadesValorativas" name="unidadesValorativas" required>
                            </div>
							
                            <div class="form-group">
                                <label>Codigo</label>
								<input type="text" id="codigo" name="codigo" required>
                            </div>
							
                            <div class="form-group">
                                <label>Clase Requisito</label>
								<select name="claseRequisito[codigo]" id="claseRequisito[codigo]">
                                    <option value="">Sin Requisito</option>
									@foreach($clasesArray as $clase)
									<option value="{{$clase['codigo']}}">{{$clase['codigo']}} {{$clase['nombre']}} </option>
									@endforeach
								</select>
                            </div>
							
                            <div class="form-group">
                                <label>Carrera</label>
								<select name="carrera[idCarrera]" id="carrera[idCarrera]">
									@foreach($carrerasArray as $carrera)
									<option value="{{$carrera['idCarrera']}}">{{$carrera['nombre']}}</option>
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
    document.getElementById('formAgregarClases').addEventListener('submit', function(event){
        event.preventDefault();

        const formData = new FormData(this);

        const data = Object.fromEntries(formData.entries());
        valorClaseRequisito = data['claseRequisito[codigo]'];

        let jsonData;

        //VALIDA SI EL INPUT DE CLASE REQUISITO ESTA VACIO
        if(valorClaseRequisito == ""){
             jsonData = {
                nombre: data.nombre,
                unidadesValorativas: data.unidadesValorativas,
                codigo: data.codigo,
                carrera:{
                    idCarrera: data['carrera[idCarrera]']
                }
            };
        } else{
             jsonData = {
            nombre: data.nombre,
            unidadesValorativas: data.unidadesValorativas,
            codigo: data.codigo,
            claseRequisito:{
                codigo: data['claseRequisito[codigo]']
            },
            carrera:{
                idCarrera: data['carrera[idCarrera]']
            }

        };
        }
        


        console.log(jsonData);

        //USA LA RUTA PARA GUARDAR
        fetch('{{route('agregarclases.post')}}', {
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