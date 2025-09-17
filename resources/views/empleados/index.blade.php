<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleados</title>
</head>
<body>

    <div>
        
        <header>
            <div>
               
                <h1>Registro de empleados</h1>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </header>

        <main>
            <p>
                ¡Bienvenido a tu sistema de gestión de empleados! Aquí podrás administrar de forma sencilla y eficiente toda la información de tus trabajadores.
            </p>

            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <div>
                <a href="{{ route('empleados.create') }}">
                    <button type="button">Registrar nuevo empleado</button>
                </a>
            </div>

            <hr>

            <div>
                <h3>Lista de Empleados</h3>
                
                @if($empleados->isNotEmpty())
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de nacimiento</th>
                                <th>CURP</th>
                                <th>Domicilio</th>
                                <th>Salario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->fecha_nacimiento }}</td>
                                    <td>{{ $empleado->curp }}</td>
                                    <td>{{ $empleado->domicilio }}</td>
                                    <td>${{ number_format($empleado->salario, 2) }} MXN</td>
                                    <td>
                                        <a >Editar</a>

                                        <form >
                                           
                                            <button >Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div>
                        <p>Actualmente no cuentas con ningún registro</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
    
</body>
</html>