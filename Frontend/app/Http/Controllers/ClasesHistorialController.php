<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use Symfony\Component\HttpFoundation\ParameterBag;

class ClasesHistorialController extends Controller
{
    public function showForm(Request $request){
        $numeroCuenta = $request->query('numeroCuenta');

        $periodos = Http::get('http://localhost:8091/api/periodo/obtener/todos');
        $periodosArray = $periodos->json();

        $estados = Http::get('http://localhost:8091/api/estado/obtener/todos');
        $estadosArray = $estados->json();

        $clases = Http::get('http://localhost:8091/api/clases/obtener/todos');
        $clasesArray = $clases->json();

        return view('components.agregarnotas', compact('clasesArray', 'periodosArray', 'estadosArray', 'numeroCuenta'));
    }

    public function selectAlumno(){
        $alumnos = Http::get('http://localhost:8091/api/alumnos/obtener/todos');
        $alumnosArray = $alumnos->json();

        return view('components.selectalumno', compact('alumnosArray'));
    }

    public function guardarNotas(Request $request, $numeroCuenta){
        //Obtiene el json del request
        $datos = $request->json()->all();
       // $datos = json_encode($datos);

       $data = [
        'clase' => [
            'codigo' => $request->clase['codigo']
        ],
        'periodo' => [
            'idPeriodo' => $request->periodo['idPeriodo']
        ],
        'calificacion' => $request->calificacion,
        'estado' => [
            'idEstado' => $request->estado['idEstado']
        ]
    ];

        $rutaApi = 'http://localhost:8091/api/claseshistorial/crear/'.$numeroCuenta;

        //Utiliza la API para crear la clase
       $respuesta = Http::post($rutaApi, $data);

        //Verifica si la respuesta fue exitosa
        if ($respuesta->successful()) {
            return redirect()->route('dashboarddocente');
        } else{
            return response()->json($request);
        }


    }
}
