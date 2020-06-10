<a href="{{ route('schedule.viewSchedule',$id) }}" nam="{{ $nameSchedule }}" id="btnViewSchedule" type="button" rel="tooltip" data-tooltip="Visualizar" data-position="top center" class="btn btn-success btn-round test button">
  <i class="material-icons">preview</i>
</a> 
@can('delete schedule')
  <button nam="{{ $nameSchedule }}" ident="{{ $id }}" id="btnDeleteSchedule" type="button" rel="tooltip" data-tooltip="Eliminar" data-position="top center" class="btn btn-danger btn-round">
    <i class="material-icons">close</i>
  </button> 
@endcan