<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AEFI - Login</title>
  <link rel="icon" href="{{ secure_asset('images/logo-uso.ico') }}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(90deg, rgba(29,69,131,1) 0%, rgba(46,132,60,1) 100%);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
<div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
  <div class="text-center mb-4">
    <img class="mx-auto h-30 w-100 object-cover" src="{{ secure_asset('images/logo-aefi.jpg') }}" alt="Logo">
  </div>
  <div>
    <p class="text-center text-lg font-medium">Iniciar Sesión</p>

    @include('_message')

    <form action="{{ secure_url('login') }}" method="post" class="space-y-4">
      {{ csrf_field() }}
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
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
          <label for="remember" class="ml-2 block text-sm text-gray-900">Recuérdame</label>
        </div>
        <button type="submit" class="ml-3 px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Iniciar</button>
      </div>
    </form>

    <div class="flex justify-between items-center mt-4">
      <a href="{{ url('forgot-password') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Olvidé mi contraseña</a>
      <a href="{{ url('signup') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Regístrate</a>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ secure_asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Font Awesome (for icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
