<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class CarrerasController extends Controller
{
    public function index(){
        return view('components.carreras');
    }

    public function guardarCarrera(Request $request){
            // Validar los datos del formulario
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
            ]);
    
            // Enviar los datos al backend de Spring Boot
            try {
                $response = Http::post('http://localhost:8091/api/carreras/crear/nuevo', $validated);
    
                if ($response->successful()) {
                    return redirect()->route('crearcarrera')->with('success', 'Carrera registrado exitosamente.');
                } else {
                    return redirect()->route('crearcarrera')->with('error', 'Hubo un error al registrar el carrera.');
                }
            } catch (\Exception $e) {
                return redirect()->route('crearcarrera')->with('error', 'No se pudo conectar con el backend.');
            }
    }
}