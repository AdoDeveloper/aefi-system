@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1 class="display-4">Clases <span class="badge bg-secondary"></span></h1>
          </div>
    
          <div class="col-md-6 mt-2 mt-md-0 text-md-end" style="text-align: right;">
            <a href="{{url('admin/class/add')}}" class="btn btn-primary">Agregar Clase</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>    
    
    <!-- Main content -->
    <section class="content">

    
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Busqueda de Clases</h3>
              </div>
              <form method="get" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Nombres</label>
                      <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Introduzca el nombre">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Apellidos</label>
                      <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name" placeholder="Introduzca los apellidos">
                    </div>
                    
              
                    <div class="form-group col-md-3 d-flex justify-content-between align-items-end">
                      <button class="btn btn-primary btn-sm" type="submit" style="flex: 1;">
                        <i class="fas fa-search m-1"></i> Buscar
                      </button>
                      <a href="{{ url('admin/class/list') }}" class="btn btn-success btn-sm ml-md-1 mt-1 mt-md-0 ml-1" style="flex: 1;">
                        <i class="fas fa-eraser m-1"></i> Limpiar
                      </a>
                    </div>
                  </div>
                </div>
              </form>              
            </div>
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registro de Clases</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Autor</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                <div class="text-end mt-3">
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            
            
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
  <script>
    function confirmDelete(userId) {
      // Crea un modal de Bootstrap para la ventana de confirmación
      const modal = `
        <div class="modal" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este administrador?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="forceCloseModal()">Cancelar</button>
                <a href="{{ url('admin/admin/delete') }}/${userId}" class="btn btn-danger">Eliminar</a>
              </div>
            </div>
          </div>
        </div>
      `;
  
      // Agrega el modal al cuerpo del documento
      document.body.insertAdjacentHTML('beforeend', modal);
  
      // Muestra el modal
      const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'), {
        backdrop: 'static'
      });
  
      confirmDeleteModal.show();
  
      // Función para forzar el cierre del modal
      window.forceCloseModal = function() {
        confirmDeleteModal.hide();
        confirmDeleteModal.dispose();
        document.getElementById('confirmDeleteModal').remove();
      };
    }
  </script>
  
  

@endsection