<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">

   <center> <a href="#" class="simple-text logo-normal">
    {{ __('HOGAR GERIATRICO') }}
    <br>
    {{ __('VILLA DANIELA') }}
      <!--<img src="../../../../material/img/faces/usuario.png" />-->
    </a>
    </center>
  </div>
  <div class="sidebar-wrapper">

  <!-- Auth::user()->Idperfil -->

  <div class="user">

  
          <div class="photo">
            <img src="../../../../material/img/faces/usuario.png" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Administrador
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">


           
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>



              </ul>
            </div>
          </div>
        </div>





    <ul class="nav">
   
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboardd</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
        <i class="material-icons">people_alt</i>
          <p>{{ __('USUARIOS') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Perfil de usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Administracion de usuario') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>


      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>

     <!--
	  
	      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#cavas" aria-expanded="true">
          <i><img src="../../../../material/img/VACA.png"></i>
          <p>{{ __('CONTROL DE CAVAS') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="cavas">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Lista cavas' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('ver-cavas') }}">
                <i class="material-icons">assignment</i>
                  <p>{{ __('LISTA DE CAVAS') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'QR Cavas' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('ver-qr') }}">
                <i class="material-icons">center_focus_weak</i>
                  <p>{{ __('QR CAVAS') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
-->
	  
   <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#despachos" aria-expanded="true">
             <i class="material-icons">local_shipping</i>
          <p>{{ __('PACIENTES') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="despachos">
		  <ul class="nav">
      <li class="nav-item{{ $activePage == 'Pacientes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('crearpaciente') }}">
          <i class="material-icons">assignment_ind</i>
            <p>{{ __('CREAR PACIENTE') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Lista pacientes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('listapacientes') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('LISTA PACIENTES') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'acudientes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('acudientes') }}">
          <i class="material-icons">local_shipping</i>
            <p>{{ __('ACUDIENTE') }}</p>
        </a>
      </li>
	     </ul>
        </div>
      </li>


  
      <li class="nav-item{{ $activePage == 'SALIR' ? ' active' : '' }}">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">directions_run</i>
            <p>{{ __('Salir') }}</p>
        </a>
      </li>

<!--

      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>

      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>

-->

    </ul>
  </div>
</div>