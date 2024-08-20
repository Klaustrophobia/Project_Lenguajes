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
        $numeroCuenta = $alumno->numeroCuenta;

        // Hacer una solicitud al backend para obtener las clases matriculadas
        $response = Http::get("http://localhost:8091/api/matricula/obtener/todos");
        $matriculas = $response->json();

        // Hacer una solicitud al backend para obtener las clases disponibles
        $responseClases = Http::get("http://localhost:8091/api/clases/obtener/todos");
        $clases = $responseClases->json();

        // Retornar la vista con las clases y matriculas
        return view('matricula', compact('matriculas', 'clases'));
    }

    public function adicionar(Request $request)
    {
        // Obtener el número de cuenta del estudiante autenticado
        $alumno = $request->session()->get('alumno');
        $numeroCuenta = $alumno->numeroCuenta;

        $datos = $request->json()->all();

        // Preparar los datos para la solicitud de matrícula
        $data = [
            'alumno' => [
                'numeroCuenta' => $numeroCuenta
            ],
            'seccion' => [
                'idSeccion' => $request->input('seccion_id')
            ]
        ];

        // Hacer una solicitud al backend para adicionar la clase
        $response = Http::post('http://localhost:8091/api/matricula/insertar/'.$numeroCuenta, $datos);

        // Verificar si la solicitud falló
        if ($response->failed()) {
            return redirect()->back()->withErrors('Error al matricular la clase.');
        }

        return redirect()->route('matricula.index')->with('success', 'Clase matriculada correctamente.');
    }

    public function cancelar(Request $request)
    {
        // Obtener el número de cuenta del estudiante autenticado
        $numeroCuenta = auth()->user()->numeroCuenta;

        // Preparar los datos para la solicitud de cancelación
        $data = [
            'alumno' => [
                'numeroCuenta' => $numeroCuenta
            ],
            'seccion' => [
                'idSeccion' => $request->input('seccion_id')
            ]
        ];

        // Hacer una solicitud al backend para cancelar la clase
        $response = Http::post('http://localhost:8091/api/matricula/cancelar', $data);

        // Verificar si la solicitud falló
        if ($response->failed()) {
            return redirect()->back()->withErrors('Error al cancelar la clase.');
        }

        return redirect()->route('matricula.index')->with('success', 'Clase cancelada correctamente.');
    }
}
