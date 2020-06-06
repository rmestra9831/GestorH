@extends('layouts.app',['activePage' => 'newSchedule', 'titlePage' => __('Nuevo Horario'),'title'=>'asd'])
@section('title',' | Nuevo Horario')
@section('content')
<div class="content">
  <div class="row align-items-center">
    <div class="col-lg-11 col-md-6 col-sm-8 ml-auto mr-auto">
      {{-- primer formulario --}}
      <div class="card card-login card-hidden mb-3">
        <div class="card-header card-header-info text-center">
          <h4 class="card-title"><strong>{{ __('Datos del horario') }}</strong></h4>
        </div>
        {{-- primer input --}}
        <div class="card-body ">
          <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">face</i>
                </span>
              </div>
              <input type="text" name="nameSchedule" class="form-control" placeholder="{{ __('Nombre de Horario') }}"  required>
            </div>
            @if ($errors->has('name'))
              <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                <strong>{{ $errors->first('name') }}</strong>
              </div>
            @endif
          </div>
        </div>
      </div>
      {{-- segundo formulario --}}
      <div class="card card-login card-hidden mb-3">
        <div class="card-header card-header-info text-center">
          <h4 class="card-title"><strong>{{ __('Asignación de Materias') }}</strong></h4>
        </div>
        <div class="card-body ">
          asd
        </div>
      </div>
    </div>
  </div>
</div>
@endsection