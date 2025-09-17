<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Log;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('empleados.index');
    }

}