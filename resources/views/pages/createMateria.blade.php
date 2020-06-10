@extends('layouts.app',['activePage' => 'newMateria', 'titlePage' => __('Nueva Materia'),'title'=>'asd'])
@section('title',' | Nueva Materia')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-body">
            <div class="card-header card-header-info">
              <h4 class="card-title text-center">Materia</h4>
            </div>
            <div class="card-body ">
                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <div class="input-group justify-content-center">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" name="nameMateria" class="form-control col-md-5 text-capitalize" placeholder="{{ __('ingresa el nombre de la materia') }}"  required><button type="button" class="btn btn-info ml-2 saveMateria">Guardar</button>
                  </div>
                  <div class="selectColor container-fluid">
                    <p class="card-category text-center">Selecciona el color que desas asignarle a la materia</p>
                    <div class="row justify-content-center m-auto col-md-8">
                      <button color="secondary" class="ui inverted secondary button"><span class="material-icons">donut_large</span></button>
                      <button color="red" class="ui inverted red button"><span class="material-icons">donut_large</span></button>
                      <button color="orange" class="ui inverted orange button"><span class="material-icons">donut_large</span></button>
                      <button color="yellow" class="ui inverted yellow button"><span class="material-icons">donut_large</span></button>
                      <button color="olive" class="ui inverted olive button"><span class="material-icons">donut_large</span></button>
                      <button color="green" class="ui inverted green button"><span class="material-icons">donut_large</span></button>
                      <button color="teal" class="ui inverted teal button"><span class="material-icons">donut_large</span></button>
                      <button color="blue" class="ui inverted blue button"><span class="material-icons">donut_large</span></button>
                      <button color="violet" class="ui inverted violet button"><span class="material-icons">donut_large</span></button>
                      <button color="purple" class="ui inverted purple button"><span class="material-icons">donut_large</span></button>
                      <button color="pink" class="ui inverted pink button"><span class="material-icons">donut_large</span></button>
                      <button color="brown" class="ui inverted brown button"><span class="material-icons">donut_large</span></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- tabla --}}
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title text-center">Usuarios</h4>
              <p class="card-category text-center">Aquí puedes editar los usuarios</p>
            </div>
            <div class="card-body">
              <div class="row">
              </div>
              <div class="table-responsive">
                <table id="tableMaterias" class="table">
                  <thead class=" text-info">
                    <tr>
                      <th>Nombre</th>
                      <th>color</th>
                      <th class="text-right">Acciones</th>
                    </tr>
                  </thead>
                  <tfoot class="ttt">
                    <tr>
                      <th>Nombre</th>
                      <th>color</th>
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
