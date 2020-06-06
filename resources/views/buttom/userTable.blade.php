@can('edit user')
  <a href="{{ route('profileUser.edit',$slug) }}" nam="{{ $name }}" ident="{{ $slug }}" id="btnEditUser" type="a" rel="tooltip" data-tooltip="Editar" data-position="top center" class="btn btn-success btn-round">
    <i class="material-icons">edit</i>
  </a> 
@endcan
<button nam="{{ $name }}" ident="{{ $slug }}" id="btnDeleteUser" type="button" rel="tooltip" data-tooltip="Eliminar" data-position="top center" class="btn btn-danger btn-round">
  <i class="material-icons">close</i>
</button> 