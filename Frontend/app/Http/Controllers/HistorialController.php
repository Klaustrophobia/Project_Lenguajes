<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistorialController extends Controller
{
    public function index(){
        $alumnosResponse = Http::get('http://localhost:8091/api/alumnos/obtener/todos');
        $alumnos = $alumnosResponse->json();

        return view('components.crearhistorial', compact('alumnos'));
    }

    public function guardarHistorial(Request $request){
        $numeroCuenta = $request->numeroCuenta;
        $codigo = $request->codigo;

        $rutaApiHistorialCrear = 'http://localhost:8091/api/historialacademico/crear/'.$numeroCuenta.'?codigo='.$codigo;

        $respuesta = Http::post($rutaApiHistorialCrear);
        
        if($respuesta->successful()){
            return redirect()->route('crearhistorial')->with('success', 'Codigo del historial registrado exitosamente.');
        } 

        return response()->json($request);
        
    }
}
