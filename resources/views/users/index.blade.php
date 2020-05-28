@extends('layouts.app',['activePage' => 'user-management', 'titlePage' => __('Usuarios'),'title'=>'asd'])
@push('title') | Usuarios @endpush

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title ">Usuarios</h4>
              <p class="card-category">Aquí puedes editar los usuarios</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{ route('register') }}" class="btn btn-sm btn-info">Nuevo Usuario</a>
                </div>
              </div>
              <div class="table-responsive">
                <table id="tableUsers" class="table">
                  <thead class=" text-info">
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Fecha de creación</th>
                      {{-- <th>Activo</th> --}}
                      <th class="text-right">Acciones</th>
                    </tr>
                  </thead>
                  <tfoot class="ttt">
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Fecha de creación</th>
                      {{-- <th>Activo</th> --}}
                      <th class="text-right">Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection