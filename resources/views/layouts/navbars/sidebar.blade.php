<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal justify-content-center">
      <img class="w-25" src="{{ asset('images/calendar.png') }}" alt="">
      <p class="titleLogo d-flex align-self-center text-justify">Gestor De <br> horarios</p>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link MichromaRegular" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      {{-- horarios --}}
      @can('schedules', Model::class)
        <li class="nav-item {{ ($activePage == 'permissionsUser') ? ' active' : '' }}">
          <a class="nav-link collapsed" data-toggle="collapse" href="#schedule" aria-expanded="false">
            <i class="material-icons">calendar_view_day</i>
            <p class="MichromaRegular">{{ __('Horarios') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse {{ ($activePage ==   'permissionsUser') ? ' show' : '' }}" id="schedule">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'permissionsUser' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('permissionsUser.view') }}">
                  <span class="sidebar-mini"> LT </span>
                  <span class="sidebar-normal MichromaRegular">{{ __('lista') }} </span>
                </a> 
              </li>
              @can('create schedule')
                <li class="nav-item{{ $activePage == 'schedule' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> CH </span>
                    <span class="sidebar-normal MichromaRegular">{{ __('Crear Horario') }} </span>
                  </a> 
                </li>
              @endcan
            </ul>
          </div>
        </li>
      @endcan
      {{-- dropdown --}}
      @hasrole('Administrador')
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
            <i class="material-icons">mood</i>
            <p class="MichromaRegular">{{ __('Usuarios') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse {{ ($activePage == 'profile' || $activePage == 'user-management' || $activePage == 'register') ? ' show' : '' }}" id="laravelExample">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                  <span class="sidebar-mini"> MP </span>
                  <span class="sidebar-normal MichromaRegular">{{ __('Mi Perfil') }} </span>
                </a> 
              </li>
              @can('create user')
                <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('register') }}">
                    <span class="sidebar-mini"> NU </span>
                    <span class="sidebar-normal MichromaRegular"> {{ __('Nuevo Usuario') }} </span>
                  </a>
                </li>
              @endcan
              @can('edit user')
                <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('user.index') }}">
                    <span class="sidebar-mini"> US </span>
                    <span class="sidebar-normal MichromaRegular"> {{ __('Usuarios') }} </span>
                  </a>
                </li>
              @endcan
            </ul>
          </div>
        </li>
      @endhasrole
      @can('permissions', Model::class)
        <li class="nav-item {{ ($activePage == 'permissionsUser') ? ' active' : '' }}">
          <a class="nav-link collapsed" data-toggle="collapse" href="#permissions" aria-expanded="false">
            <i class="material-icons">assignment</i>
            <p class="MichromaRegular">{{ __('Permisos') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse {{ ($activePage ==   'permissionsUser') ? ' show' : '' }}" id="permissions">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'permissionsUser' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('permissionsUser.view') }}">
                  <span class="sidebar-mini"> LT </span>
                  <span class="sidebar-normal MichromaRegular">{{ __('Lista') }} </span>
                </a> 
              </li>
              @can('assign permissions')
                <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> AS </span>
                    <span class="sidebar-normal MichromaRegular">{{ __('Asignar') }} </span>
                  </a> 
                </li>
              @endcan
            </ul>
          </div>
        </li>
      @endcan
      {{-- pie de pagina --}}
      <li class="nav-item active-pro bg-info">
        <div class="nav-link text-white">
          <p class="MichromaRegular text-center">@role('Administrador') Administradoristrador @else @if('Docente') Docente @else Estudiante @endrole @endrole</p>
        </div>
      </li>
    </ul>
  </div>
</div>
