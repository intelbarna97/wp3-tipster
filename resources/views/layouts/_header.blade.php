<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <div class="col-4 d-flex justify-content-start align-items-center">
        <img src="https://www.pngall.com/wp-content/uploads/5/Sports-Ball-PNG-Image.png" class="img-fluid rounded float-left" style="padding: 5px" width="50" height="50" alt="Responsive image">
        @auth

        <a class="btn btn-outline-primary" href="{{ route('team.list')}}">{{ __('Teams') }}</a>

        
        @if (App\Http\Controllers\Auth\AuthenticatedSessionController::isAdmin(Auth::user()))
            
        
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('Add New') }}
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('game.create')}}">{{ __('Add New Game') }}</a>
            <a class="dropdown-item" href="{{ route('team.create')}}">{{ __('Add New Team') }}</a>
            <a class="dropdown-item" href="{{ route('league.create')}}">{{ __('Add New League') }}</a>
            <a class="dropdown-item" href="{{ route('city.create')}}">{{ __('Add New City') }}</a>
            <a class="dropdown-item" href="{{ route('country.create')}}">{{ __('Add New Country') }}</a>
          </div>
        </div>

        @endif
        @endauth
        </div>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/">Tipster</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        @auth
        <div class="d-flex">
          <img class="rounded-circle" width="40" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->username }}">
        </div>
        <div class="nav-item dropdown">
        
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('auth.edit')}}">{{__('Edit profile')}}</a>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="dropdown-item" type="submit">{{__('Logout')}}</button>
            </form>
          </div>
        </div>
        @else
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login')}}">{{__('Sign in')}}</a>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('register')}}">{{__('Sign up')}}</a>
        @endauth
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @foreach ($leagues as $league)
      <a class="p-2 link-secondary" href="{{ route('list', $league->id)}}">{{ $league->name }}</a>
      @endforeach
    </nav>
  </div>
</div>