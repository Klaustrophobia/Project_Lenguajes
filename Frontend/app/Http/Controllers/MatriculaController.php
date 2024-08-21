<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatriculaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el número de cuenta del estudiante autenticado
        $alumno = $request->session()->get('alumno');
        $numeroCuenta = $alumno->NumeroCuenta;

        // Hacer una solicitud al backend para obtener las clases matriculadas
        $rutaApiMatriculas = 'http://localhost:8091/api/matricula/obtener/alumno/'.$numeroCuenta;
        $response = Http::get($rutaApiMatriculas);
        $matriculas = $response->json();

        // Hacer una solicitud al backend para obtener las clases disponibles
        $responseSecciones = Http::get("http://localhost:8091/api/secciones/obtener/todos");
        $secciones = $responseSecciones->json();

        // Retornar la vista con las clases y matriculas
        return view('matricula', compact('matriculas', 'secciones'));
    }

    public function adicionar(Request $request){
        // Obtener el número de cuenta del estudiante autenticado
        $alumno = $request->session()->get('alumno');
        $numeroCuenta = $alumno->NumeroCuenta;

        $idSeccion = $request->idSeccion;

        // Hacer una solicitud al backend para adicionar la clase
        $response = Http::post('http://localhost:8091/api/matricula/insertar/'.$numeroCuenta.
        '?idSeccion='.$idSeccion);

        // Verificar si la solicitud falló
        if ($response->failed()) {
            return response()->json($request);
        }

        return redirect()->route('matricula.index')->with('success', 'Clase matriculada correctamente.');
    }



    public function cancelar(Request $request){
        // Obtener el número de cuenta del estudiante autenticado
        $alumno = $request->session()->get('alumno');
        $numeroCuenta = $alumno->NumeroCuenta;

        $idMatricula = $request->matricula['idMatricula'];

        $rutaApiBorrar = 'http://localhost:8091/api/matricula/borrar/'.$idMatricula;
        // Hacer una solicitud al backend para cancelar la clase
        $response = Http::post($rutaApiBorrar);

        // Verificar si la solicitud falló
        if ($response->failed()) {
            return response()->json($request);
        } 

        return redirect()->route('matricula.index')->with('success', 'Clase cancelada correctamente.');
    }
}
