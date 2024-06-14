@extends('layouts.app')

@section('content')

<div class="d-flex">
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
          <li class="nav-item">
            <a href="{{url('student/Actividades')}}" class="nav-link  @if(Request::segment(2) == 'actividades') active @endif">
            <i class="nav-icon fas fa-tasks text-blue-500 mr-2"></i>
              <p>Actividades</p>
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

 <div class="flex justify-center items-center min-h-screen p-4 w-full">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
      <div class="bg-white text-black rounded-lg p-6 shadow-md transform transition-transform hover:scale-105 dark:bg-zinc-700 dark:text-white">
        <h3 class="text-lg font-bold mb-2 text-green-400">Actividad: Día del Internet</h3>
        <p class="text-sm text-zinc-700 mb-4 dark:text-zinc-300">Descripción de la actividad: .</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Fecha: 2023-10-01</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Hora: 10:00 AM</p>
      </div>
      <div class="bg-white text-black rounded-lg p-6 shadow-md transform transition-transform hover:scale-105 dark:bg-zinc-700 dark:text-white">
      <h3 class="text-lg font-bold mb-2 text-green-400">Actividad: Congreso USO</h3>
        <p class="text-sm text-zinc-700 mb-4 dark:text-zinc-300">Descripción de la actividad 2.</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Fecha: 2023-10-02</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Hora: 11:00 AM</p>
      </div>
      <div class="bg-white text-black rounded-lg p-6 shadow-md transform transition-transform hover:scale-105 dark:bg-zinc-700 dark:text-white">
        <h3 class="text-lg font-bold mb-2 text-green-400">Actividad: Ponencias</h3>
        <p class="text-sm text-zinc-700 mb-4 dark:text-zinc-300">Descripción de la actividad 3.</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Fecha: 2023-10-03</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Hora: 12:00 PM</p>
      </div>
      <div class="bg-white text-black rounded-lg p-6 shadow-md transform transition-transform hover:scale-105 dark:bg-zinc-700 dark:text-white">
        <h3 class="text-lg font-bold mb-2 text-green-400">Actividad: Talleres</h3>
        <p class="text-sm text-zinc-700 mb-4 dark:text-zinc-300">Descripción de la actividad 3.</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Fecha: 2023-10-03</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Hora: 12:00 PM</p>
      </div>
    </div>
</div>

</div>

<script>
  function toggleDescription(id) {
    const desc = document.getElementById(id);
    desc.classList.toggle('hidden');
  }
</script>

@endsection
