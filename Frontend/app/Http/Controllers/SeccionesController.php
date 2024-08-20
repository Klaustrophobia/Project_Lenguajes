<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class SeccionesController extends Controller
{
    public function showForm(){
        $aulas = Http::get('http://localhost:8091/api/aulas/obtener/todos');
        $aulasArray = $aulas->json();

        $clases = Http::get('http://localhost:8091/api/clases/obtener/todos');
        $clasesArray = $clases->json();

        $docentes = Http::get('http://localhost:8091/api/docentes/obtener/todos');
        $docentesArray = $docentes->json();

        $periodos = Http::get('http://localhost:8091/api/periodo/obtener/todos');
        $periodosArray = $periodos->json();

        return view('components.agregarsecciones', compact('aulasArray', 'clasesArray', 'docentesArray', 'periodosArray'));
    }

    public function guardarSecciones(Request $request){
        //Obtiene el json del request
        $datos = $request->json()->all();

        //Acceder a la API para crear seccion
        $respuesta = Http::post('http://localhost:8091/api/secciones/crear/nuevo', $datos);

        //Verifica si la respuesta fue exitosa
        if ($respuesta->successful()) {
            return redirect()->back();
        } else {
            return response()->json(['mensaje' => 'Error al guardar los datos'], 500);
        }


    }
}
