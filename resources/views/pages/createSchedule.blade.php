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
          <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }} d-flex">
            {{-- nombre quein lo crea --}}
            <div class="input-group col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">face</i>
                </span>
              </div>
              <input readonly="" type="text" name="createBy" class="form-control" slug="{{ auth()->user()->slug }}" value="{{ auth()->user()->name }}" placeholder="{{ __('Nombre de Horario') }}" value="{{ auth()->user()->name }}" required>
            </div>
            {{-- nombre de horario --}}
            <div class="input-group col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">chrome_reader_mode</i>
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
          {{-- lista para seleccionar --}}
          <p class="card-category text-center h3">Arrastra la materia al día que quieras asignarsela</p>

          <div class="lists">
            <div class="list col-md-8" id="lista">
              @foreach ($materias as $materia)
                <button class="ui list-item item {{ $materia->color }} button text-capitalize" data-id="{{ $materia->name }}">{{ $materia->name }} <span class="material-icons removeItemList">clear</span></button>
              @endforeach              
            </div>
          </div>
          {{-- horarios --}}
          <div class="schedule ">
            <div class="card-day hour">
              <p>Hora</p>
              <div class="day wide column">
                <div class="list-item item-hour">6am</div>
                <div class="list-item item-hour">7am</div>
                <div class="list-item item-hour">8am</div>
                <div class="list-item item-hour">9am</div>
                <div class="list-item item-hour">10am</div>
                <div class="list-item item-hour">11am</div>
              </div>
            </div>
            <div class="card-day">
              <p>Lunes</p>
              <div class="day wide column" id="day1"><div class="list-item break" data-id="descanso">Descanso</div></div>
            </div>
            <div class="card-day">
              <p>Martes</p>
              <div class="day wide column" id="day2"><div class="list-item break" data-id="descanso">Descanso</div></div>
            </div>
            <div class="card-day">
              <p>Miercoles</p>
              <div class="day wide column" id="day3"><div class="list-item break" data-id="descanso">Descanso</div></div>
            </div>
            <div class="card-day">
              <p>Jueves</p>
              <div class="day wide column" id="day4"><div class="list-item break" data-id="descanso">Descanso</div></div>
            </div>
            <div class="card-day">
              <p>Viernes</p>
              <div class="day wide column" id="day5"><div class="list-item break" data-id="descanso">Descanso</div></div>
            </div>

          </div>
          <div class="justify-content-center d-flex">
            <button id="saveSchedule" class="ui inverted primary button w-75">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection