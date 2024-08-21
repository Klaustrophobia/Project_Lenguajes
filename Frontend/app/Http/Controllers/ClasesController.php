<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class ClasesController extends Controller
{
    public function showForm(){
        $carreras = Http::get('http://localhost:8091/api/carreras/obtener/todos');
        $carrerasArray = $carreras->json();

        $clases = Http::get('http://localhost:8091/api/clases/obtener/todos');
        $clasesArray = $clases->json();

        return view('components.agregarclases', compact('clasesArray', 'carrerasArray'));
    }

    public function guardarClases(Request $request){
        //Obtiene el json del request
        $datos = $request->json()->all();

        //Utiliza la API para crear la clase
        $respuesta = Http::post('http://localhost:8091/api/clases/crear/nuevo', $datos);

        //Verifica si la respuesta fue exitosa
        if ($respuesta->successful()) {
            return redirect()->route('agregarclases')->with('success', 'Clase agregada correctamente.');
        } else {
            return redirect()->route('agregarclases')->with('success', 'No se pudo agregar la clase');
        }


    }
}
