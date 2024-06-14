@extends('layouts.app')

@section('content')

<aside class="main-sidebar sidebar-dark-primary">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-white pt-3 d-flex align-items-center">
    <img src="{{ url('images/logo-uso.svg') }}" alt="Logo" class="text-white pl-2" style="width: 3rem;">
    <span class="brand-text font-weight-bold" style="font-size: 2.5rem;">AEFI</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type == 1)
        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>Admin</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/class/list') }}" class="nav-link @if(Request::segment(2) == 'class') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>Clases</p>
          </a>
        </li>
        @elseif(Auth::user()->user_type == 2)
        <li class="nav-item">
          <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- Otras secciones específicas para maestros -->

        @elseif(Auth::user()->user_type == 3)
        <li class="nav-item">
          <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- Otras secciones específicas para estudiantes -->

        @elseif(Auth::user()->user_type == 4)
        <li class="nav-item">
          <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- Otras secciones específicas para padres -->

        @endif

        <li class="nav-item">
          <a href="{{ url('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Cerrar Sesión</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Perfil</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <form method="post" action="" enctype="multipart/form-data">
                  {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" class="form-control" name="name"  required placeholder="Introduzca el nombre">
                  </div>
                  <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="last_name"  required placeholder="Introduzca los nombre">
                  </div>
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="form-control"  name="email"  required placeholder="introduzca el correo">
                  </div>
                  <div class="form-group">
                    <label>Contraseña Actual</label>
                    <input type="password" class="form-control" name="current_password" placeholder="Introduzca la contraseña actual">
                  </div>
                  <div class="form-group">
                    <label>Nueva Contraseña</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Introduzca la nueva contraseña">
                  </div>
                  <div class="form-group">
                    <label>Confirmar Nueva Contraseña</label>
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirme la nueva contraseña">
                  </div>
                  <div class="form-group">
                    <label>Foto de perfil</label>
                    <input type="file" class="form-control" name="user_photo" accept="image/*" placeholder="Foto de perfil">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                  <a href="{{ url('student/dashboard')}}" class="btn btn-secondary">Regresar</a>
                </div>
              </form>
            </div>
           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    

@endsection