<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario'   => 'required|email',
            'password'  => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $usuario = Usuario::where('usuario', $request->usuario)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            if ($usuario) {
                Log::create([
                    'id_usuario'     => $usuario->id_usuario,
                    'accion'         => 'login',
                    'tabla_afectada' => null,
                ]);
            }

            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }

        Log::create([
            'id_usuario'     => $usuario->id_usuario,
            'accion'         => 'login',
            'tabla_afectada' => null,
        ]);

        session(['usuario_id' => $usuario->id_usuario]);

        return redirect()->route('empleados.index');
    }

    public function logout(Request $request)
    {
        if (session('usuario_id')) {
            Log::create([
                'id_usuario'     => session('usuario_id'),
                'accion'         => 'logout',
                'tabla_afectada' => null,
            ]);
        }

        $request->session()->forget('usuario_id');

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
