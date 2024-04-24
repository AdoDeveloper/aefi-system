<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AEFI - Login</title>
  <link rel="icon" href="{{ secure_asset('images/logo-uso.ico') }}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ secure_asset('dist/css/adminlte.min.css') }}">
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
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
  <div class="card-header text-center">
      <img class="img-fluid img-thumbnail" src="{{ secure_asset('images/logo-aefi.jpg') }}" alt="">
  </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

      @include('_message')

      <form action="{{ url('login') }}" method="post">
        {{ csrf_field() }}
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
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Recuérdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="row pt-2">
          <p class="col-9">
            <a href="{{ url('forgot-password') }}">Olvidé mi contraseña</a>
          </p> 
          <p class="col-3">
            <a href="{{ url('signup') }}">Regístrate</a>
          </p>
      </div>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ secure_asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ secure_asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>