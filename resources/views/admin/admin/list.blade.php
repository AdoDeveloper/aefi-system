@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores (Totales : {{ $getRecord->total() }})</h1>
          </div>


          <div class="col-sm-6" style="text-align: right;">
            <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Agregar Admin</a>
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
                <h3 class="card-title"> Busqueda de Administradores</h3>
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
                    <div class="form-group col-md-3">
                      <label>Correo</label>
                      <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Introduzca el correo">
                    </div>
              
                    <div class="form-group col-md-3 d-flex justify-content-between align-items-end">
                      <button class="btn btn-primary" type="submit" style="flex: 1;">
                        <i class="fas fa-search m-1"></i> Buscar
                      </button>
                      <a href="{{ url('admin/admin/list') }}" class="btn btn-success ml-2" style="flex: 1;">
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
                <h3 class="card-title">Registro de Administradores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="d-sm-table-cell">ID</th>
                        <th class="d-sm-table-cell">Nombre</th>
                        <th class="d-sm-table-cell">Apellido</th>
                        <th class="d-none d-sm-table-cell">Correo</th>
                        <th class="d-none d-sm-table-cell">Creado</th>
                        <th class="d-none d-sm-table-cell">Actualizado</th>
                        <th class="d-sm-table-cell">Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td class="d-sm-table-cell">{{ $value->id}}</td>
                        <td class="d-sm-table-cell">{{ $value->name}}</td>
                        <td class="d-sm-table-cell">{{ $value->last_name}}</td>
                        <td class="d-none d-sm-table-cell">{{ $value->email}}</td>
                        <td class="d-none d-sm-table-cell">{{ $value->created_at}}</td>
                        <td class="d-none d-sm-table-cell">{{ $value->updated_at}}</td>
                        <td class="d-sm-table-cell">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ url('admin/admin/edit/' .$value->id) }}" class="btn btn-primary btn-sm">
                              <i class="fas fa-edit m-1"></i> Modificar
                            </a>
                            <a href="{{ url('admin/admin/delete/' .$value->id) }}" class="btn btn-danger btn-sm ml-md-1 mt-1 mt-md-0">
                              <i class="fas fa-trash-alt m-1"></i> Eliminar
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="text-end mt-3">
                  {!! $getRecord->appends(request()->except('page'))->links() !!}
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
    
@endsection