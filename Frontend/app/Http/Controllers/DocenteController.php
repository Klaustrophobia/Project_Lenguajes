<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DocenteController extends Controller
{
    public function showRegisterForm(){
        return view('components.registerdocente');
    }

    public function registerDocente(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'idDocente' => 'required|int',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:alumnos',
            'contrasena' => 'required|string|min:8',
            'sexo' => 'required|in:M,F'
        ]);

        // Enviar los datos al backend de Spring Boot
        try {
            $response = Http::post('http://localhost:8091/api/docentes/crear/nuevo', $validated);

            if ($response->successful()) {
                return redirect()->route('registerdocente')->with('success', 'Docente registrado exitosamente.');
            } else {
                return redirect()->route('registerdocente')->with('error', 'Hubo un error al registrar el docente.');
            }
        } catch (\Exception $e) {
            return redirect()->route('registerdocente')->with('error', 'No se pudo conectar con el backend.');
        }
    }
}
