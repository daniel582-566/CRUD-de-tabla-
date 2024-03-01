
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ route('home')}}">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ setActive('home') }}">
            <a class="nav-link" href="{{ route('home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{setActive('projects.*') }}">
            <a class="nav-link" href="{{Route('projects.index')}}">Proyectos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{setActive('about')}}" href="{{Route('about')}}">Sobre Nosotros</a>
          </li>
          <li class="nav-item {{ setActive('contact')}}">
            <a class="nav-link" href="{{Route('contact')}}">Contactanos</a>
          </li>
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Autenticacion
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{Route('users.index')}}">Usuarios</a>
                <a class="dropdown-item" href="{{Route('roles.index')}}">Roles</a>
              </div>
            </li>
         @endauth
        </ul>
          <div class="form-inline my-2 my-lg-0">
            @guest
              <a class="nav-link" href="{{Route('login')}}">Login</a>
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ auth()->user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="nav-link" href="#" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"> Cerrar Sesion </a>
                </div>
              </div>


            @endguest

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>

      </div>
  </div>
</nav>
