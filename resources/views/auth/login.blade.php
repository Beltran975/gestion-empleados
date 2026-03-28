<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de empleados - Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">


</head>
<body>

  <div class="split-screen">
    <!-- Lado izquierdo -->
    <div class="form-section">
        <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('images/engineer.png') }}" alt="Logo">
                </div>
                <h1>Registro de empleados</h1>
        </div>
      <div class="form-wrapper">
        

        <div class="form-content">
          <h3>Inicia sesión</h3>
          <p>Inicia sesión con tu correo electrónico y contraseña</p>

          <!-- Mensajes de error de Laravel -->
          @if(session('error'))
              <p style="color:red">{{ session('error') }}</p>
          @endif

          @if($errors->any())
              <ul style="color:red">
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          <!-- Formulario funcional -->
          <form action="{{ route('login.post') }}" method="POST">
              @csrf

              <label for="usuario">Email</label>
              <input type="email" name="usuario" value="{{ old('usuario') }}" placeholder="correo@gmail.com" required>

              <label for="password">Contraseña</label>
              <input type="password" name="password" placeholder="•••••••••••" required minlength="8">

              <button type="submit">Iniciar Sesión</button>
          </form>
        </div>
      </div>

    </div>

    <!-- Lado derecho -->
    <div class="image-section">
      <img src="{{ asset('images/imagen.png') }}" alt="Ilustración empleados">
    </div>
  </div>

</body>
</html>
