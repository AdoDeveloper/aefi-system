<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AEFI - Registro</title>
  <link rel="icon" href="{{url('public/images/logo-uso.ico')}}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  <!-- Bootstrap CSS (v4.6.0) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Your custom styles -->
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
  <style>
    body{
      background: rgb(29,69,131);
      background: linear-gradient(90deg, rgba(29,69,131,1) 0%, rgba(46,132,60,1) 100%);
    }

    .login-box,
    .card {
      border-radius: 20px; /* Ajusta el radio según tus preferencias */
    }
  </style>
</head>
<body class="hold-transition login-page $enable-gradients.aqua-gradient">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img class="img-fluid img-thumbnail" src="{{ url ('public/images/logo-aefi.jpg')}}" alt="">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Crear cuenta</p>

      @include('_message')
      
      <form method="POST" action="{{ route('register.user') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    
        <div class="input-group mb-3">
            <input type="text" class="form-control" required name="name" placeholder="Nombres">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
    
        <div class="input-group mb-3">
            <input type="text" class="form-control" required name="last_name" placeholder="Apellidos">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
    
        <div class="input-group mb-3">
            <input type="email" class="form-control" required name="email" placeholder="Correo institucional">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
    
        <div class="input-group mb-3">
            <input type="password" class="form-control" required name="password" placeholder="Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control" required name="password_confirmation" placeholder="Confirmar Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
    
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="user_photo" accept="image/*" placeholder="Foto de perfil">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-image"></span>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
            </div>
        </div>
        
        <div class="row pt-2">
            <p class="col-12">
                ¿Ya tienes una cuenta? <a href="{{ url('')}}">Inicia sesión</a>
            </p>
        </div>
    </form>
</div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-e3b0c351d02a2beebed5d14c406772b3d28c7f3a" crossorigin="anonymous"></script>
  <!-- Bootstrap JS (v4.6.0) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha384-vhq89TM+U6tb5Ac6pUarLuuU0d2dj5uwkSYO3+hJjo4tDOtYSo/h5+qDHf6u" crossorigin="anonymous"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
</body>
</html>