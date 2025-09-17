<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleados</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="container">
        
<header>
    <div class="logo">
        <div class="logo-icon">
            <img src="{{ asset('images/engineer.png') }}" alt="Logo">
        </div>
        <h1>Registro de empleados</h1>
    </div>

    <form method="POST" action="{{ route('logout') }}" style="display:inline;" id="logout-form">
    @csrf
    <button type="submit" class="logout-link">
        Cerrar sesión
    </button>
</form>
</header>

        <main>
            <p class="welcome-message">
                ¡Bienvenido a tu sistema de gestión de empleados! Aquí podrás administrar de forma sencilla y eficiente toda la información de tus trabajadores.
            </p>

            @if(session('success'))
                <p class="alert-success">{{ session('success') }}</p>
            @endif

            <div class="employee-list">
                <div class="employee-list-header">
                    <div>Nombre</div>
                    <div>Fecha de nacimiento</div>
                    <div>CURP</div>
                    <div>Domicilio</div>
                    <div>Salario</div>
                    <div>Acciones</div>
                </div>

                @forelse($empleados as $empleado)
                    <div class="employee-row">
                        <div>{{ $empleado->nombre }}</div>
                        <div>{{ $empleado->fecha_nacimiento }}</div>
                        <div>{{ $empleado->curp }}</div>
                        <div>{{ $empleado->domicilio }}</div>
                        <div>${{ number_format($empleado->salario, 2) }} MXN</div>
                        <div class="actions">
                            <a href="#" class="action-btn-edit" data-modal-target="#modal-edit-{{ $empleado->id_empleado }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="action-btn-delete" data-modal-target="#modal-delete-{{ $empleado->id_empleado }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </div>
                    
                    @include('empleados.edit', ['empleado' => $empleado])
                    @include('empleados.delete', ['empleado' => $empleado])
                @empty
                    <div class="empty-message">
                        Actualmente no cuentas con ningún registro
                    </div>
                @endforelse
            </div>

            <div class="cta-section">
                <button type="button" class="btn-primary" data-modal-target="#modal-create">
                    Registrar nuevo empleado
                </button>
            </div>
        </main>
    </div>

    @include('empleados.create')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalTriggers = document.querySelectorAll('[data-modal-target]');
            const modalCloses = document.querySelectorAll('[data-modal-close]');
            const openModal = (modal) => {
                if (modal) {
                    modal.style.display = 'flex';
                }
            };
            const closeModal = (modal) => {
                if (modal) {
                    modal.style.display = 'none';
                }
            };
            modalTriggers.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    const modalId = button.getAttribute('data-modal-target');
                    const modal = document.querySelector(modalId);
                    openModal(modal);
                });
            });
            modalCloses.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.modal-overlay');
                    closeModal(modal);
                });
            });
            document.querySelectorAll('.modal-overlay').forEach(overlay => {
                overlay.addEventListener('click', (event) => {
                    if (event.target === overlay) {
                        closeModal(overlay);
                    }
                });
            });
        });
    </script>
</body>
</html>