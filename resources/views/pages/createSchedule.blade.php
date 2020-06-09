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
          {{-- lista para seleccionar --}}
          <div class="lists">
            <div class="list" id="lista">
              <button class="ui inverted button">Standard <span class="material-icons removeItemList">clear</span></button>
              <button class="ui list-item item red button">Red <span class="material-icons removeItemList">clear</span></button>
              <button class="ui list-item item orange button">Orange <span class="material-icons removeItemList">clear</span></button>
              <button class="ui list-item item yellow button">Yellow <span class="material-icons removeItemList">clear</span></button>
              <button class="ui list-item item olive button">Olive <span class="material-icons removeItemList">clear</span></button>
              <button class="ui list-item item green button">Green <span class="material-icons removeItemList">clear</span></button>
              {{-- <div class="list-item" data-id="item1">item 1 <span class="material-icons removeItemList">clear</span></div>
              <div class="list-item" data-id="item2">item 2 <span class="material-icons removeItemList">clear</span></div>
              <div class="list-item" data-id="item3">item 3 <span class="material-icons removeItemList">clear</span></div>
              <div class="list-item" data-id="item4">item 4 <span class="material-icons removeItemList">clear</span></div>
              <div class="list-item" data-id="item5">item 5 <span class="material-icons removeItemList">clear</span></div> --}}
            </div>
          </div>
        {{-- horarios --}}
        <div class="schedule ">
          <div class="card-day hour">
            <p>Hora</p>
            <div class="day wide column">
              <div class="list-item item-hour">11am</div>
              <div class="list-item item-hour">10am</div>
              <div class="list-item item-hour">9am</div>
              <div class="list-item item-hour">8am</div>
              <div class="list-item item-hour">7am</div>
              <div class="list-item item-hour">6am</div>
            </div>
          </div>
          <div class="card-day">
            <p>Lunes</p>
            <div class="day wide column" id="day1"><div class="list-item break">Descanso</div></div>
          </div>
          <div class="card-day">
            <p>Martes</p>
            <div class="day wide column" id="day2"><div class="list-item break">Descanso</div></div>
          </div>
          <div class="card-day">
            <p>Miercoles</p>
            <div class="day wide column" id="day3"><div class="list-item break">Descanso</div></div>
          </div>
          <div class="card-day">
            <p>Jueves</p>
            <div class="day wide column" id="day4"><div class="list-item break">Descanso</div></div>
          </div>
          <div class="card-day">
            <p>Viernes</p>
            <div class="day wide column" id="day5"><div class="list-item break">Descanso</div></div>
          </div>

        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection