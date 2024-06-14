<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AEFI - Registro</title>
  <link rel="icon" href="{{ secure_asset('images/logo-uso.ico') }}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Tailwind CSS -->
  @vite('resources/css/app.css')

  <style>
    body {
      background: linear-gradient(90deg, rgba(29,69,131,1) 0%, rgba(46,132,60,1) 100%);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
<div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
  <div class="text-center mb-4">
    <img class="mx-auto h-30 w-100 object-cover" src="{{ secure_asset('images/logo-aefi.jpg') }}" alt="Logo">
  </div>
  <div>
    <p class="text-center text-lg font-medium">Crear cuenta</p>

    @include('_message')
    
    <form method="POST" action="{{ route('register.user') }}" enctype="multipart/form-data" class="space-y-4">
      {{ csrf_field() }}
  
      <div class="flex flex-col">
          <label for="name" class="sr-only">Nombres</label>
          <div class="relative">
              <input type="text" id="name" name="name" required class="block w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Nombres">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="fas fa-user"></span>
              </div>
          </div>
      </div>
  
      <div class="flex flex-col">
          <label for="last_name" class="sr-only">Apellidos</label>
          <div class="relative">
              <input type="text" id="last_name" name="last_name" required class="block w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Apellidos">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="fas fa-user"></span>
              </div>
          </div>
      </div>
  
      <div class="flex flex-col">
          <label for="email" class="sr-only">Correo institucional</label>
          <div class="relative">
              <input type="email" id="email" name="email" required class="block w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Correo institucional">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="fas fa-envelope"></span>
              </div>
          </div>
      </div>
  
      <div class="flex flex-col">
          <label for="password" class="sr-only">Contraseña</label>
          <div class="relative">
              <input type="password" id="password" name="password" required class="block w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contraseña">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="fas fa-lock"></span>
              </div>
          </div>
      </div>

      <div class="flex flex-col">
          <label for="password_confirmation" class="sr-only">Confirmar Contraseña</label>
          <div class="relative">
              <input type="password" id="password_confirmation" name="password_confirmation" required class="block w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Confirmar Contraseña">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="fas fa-lock"></span>
              </div>
          </div>
      </div>
  
      <div class="flex flex-col">
          <label for="user_photo" class="sr-only">Foto de perfil</label>
          <div class="relative">
              <input type="file" id="user_photo" name="user_photo" accept="image/*" class="block w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="fas fa-image"></span>
              </div>
          </div>
      </div>
  
      <div class="flex justify-between items-center mt-4">
          <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear Cuenta</button>
      </div>
      
      <div class="text-center mt-4">
          <p class="text-sm">
              ¿Ya tienes una cuenta? <a href="{{ url('login') }}" class="text-indigo-600 hover:text-indigo-500">Inicia sesión</a>
          </p>
      </div>
    </form>
  </div>
</div>

<!-- jQuery -->
<script src="{{ secure_asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Font Awesome (for icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
