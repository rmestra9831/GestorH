@extends('layouts.app',['activePage' => 'listSchedule', 'titlePage' => __('Lista De Horarios')])
@push('title') | Horarios @endpush

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
            <h4 class="card-title text-center">Horarios</h4>
            <p class="card-category text-center">Aquí puedes Ver los Horarios</p>
          </div>
          <div class="card-body">
            <div class="row">
            </div>
            <div class="table-responsive">
              <table id="tableSchedule" class="table">
                <thead class=" text-info">
                  <tr>
                    <th>Creador</th>
                    <th>Nombre de Horario</th>
                    <th class="text-right">Acciones</th>
                  </tr>
                </thead>
              </table>
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