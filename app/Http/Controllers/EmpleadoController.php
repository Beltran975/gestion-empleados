<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Log;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date|before:today',
            'curp' => 'required|string|max:18',
            'domicilio' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'telefono' => 'required|string|max:15', // nuevo campo
        ]);

        $empleado = Empleado::create($request->all());

        Log::create([
            'id_usuario' => session('usuario_id'),
            'accion' => 'crear',
            'tabla_afectada' => 'empleados',
        ]);

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }
}
