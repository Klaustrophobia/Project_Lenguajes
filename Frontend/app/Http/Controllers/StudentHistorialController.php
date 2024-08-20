<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class StudentHistorialController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el usuario de la sesión
        $alumno = $request->session()->get('alumno');
        $clasesHistorial = Http::get('localhost:8091/api/claseshistorial/obtener/todos/'.$alumno->NumeroCuenta);
        $clasesHistorialArray = $clasesHistorial->json();

        // Si no hay un usuario en la sesión, redirigir al login
        if (!$alumno) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión.');
        }

        // Retornar la vista del historial con los datos del alumno
        return view('historial', compact('alumno', 'clasesHistorialArray'));
    }
}
