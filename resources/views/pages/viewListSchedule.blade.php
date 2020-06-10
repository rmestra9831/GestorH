@extends('layouts.app',['activePage' => 'listSchedule', 'titlePage' => __('Lista Especificada')])
@push('title') | Vista Especificada @endpush

@section('content')
<div class="content">
  <div class="row align-items-center">
    <div class="col-lg-11 col-md-6 col-sm-8 ml-auto mr-auto">
{{-- tabla --}}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title text-center">Horario <strong>"{{ $schedule->nameSchedule }}"</strong></h4>
            <p class="card-category text-center">Creado por {{ $schedule->createBy->name }}</p>
          </div>
          <div class="card-body">
            <div class="row">
            </div>
            <div class="table-responsive">
              
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
                  <div class="day wide column" id="day1">
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu1 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu2 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu3 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu4 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu5 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu6 }}</button>
                  </div>
                </div>
                <div class="card-day">
                  <p>Martes</p>
                  <div class="day wide column" id="day2">
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ma1 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ma2 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ma3 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ma4 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ma5 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ma6 }}</button>
                  </div>
                </div>
                <div class="card-day">
                  <p>Miercoles</p>
                  <div class="day wide column" id="day3">
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->mi1 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->mi2 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->mi3 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->mi4 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->mi5 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->mi6 }}</button>
                  </div>
                </div>
                <div class="card-day">
                  <p>Jueves</p>
                  <div class="day wide column" id="day4">
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ju1 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ju2 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ju3 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ju4 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ju5 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->ju6 }}</button>
                  </div>
                </div>
                <div class="card-day">
                  <p>Viernes</p>
                  <div class="day wide column" id="day5">
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu1 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu2 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu3 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu4 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu5 }}</button>
                    <button class="ui list-item item grey basic button text-capitalize">{{ $schedule->lu6 }}</button>
                  </div>
                </div>
    
              </div>

            </div>
          </div>
        </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div>
@endsection