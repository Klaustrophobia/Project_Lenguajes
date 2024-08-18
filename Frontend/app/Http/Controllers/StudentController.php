<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function registerStudent(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:alumnos',
            'contrasena' => 'required|string|min:8',
            'sexo' => 'required|in:M,F',
        ]);

        // Enviar los datos al backend de Spring Boot
        try {
            $response = Http::post('http://localhost:8091/api/alumnos/crear/nuevo', $validated);

            if ($response->successful()) {
                return redirect()->route('register')->with('success', 'Estudiante registrado exitosamente.');
            } else {
                return redirect()->route('register')->with('error', 'Hubo un error al registrar el estudiante.');
            }
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'No se pudo conectar con el backend.');
        }
    }
}
