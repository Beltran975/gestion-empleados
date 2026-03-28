<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{

    public function run(): void
    {
        Usuario::create([
            'usuario' => 'gestion35@gmail.com', 
            'password' => Hash::make('Gestion965!'), 
            'rol' => 'admin',
        ]);
    }
}
