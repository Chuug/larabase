@if (Auth::check())
  <div id="mySidenav" class="sidenav bg-dark">
    <div class="text-center">
        <img src="/storage/users/avatar/{{ Auth::user()->id }}.png" class="rounded-circle avatar-side avatar-shadow mt-4 mb-1" id="side-user" alt="avatar">   
        <h6 class="text-light">@if(Auth::user()->isAdmin)<i class="fas fa-crown text-info mr-2"></i>@endif{{ Auth::user()->name }}</h6>
    </div>
    <div class="side-menu mt-3">
      @if (Auth::user()->isBlogger)
        <a href="{{ route('blog.index') }}" class="side-button"><i class="fas fa-newspaper mr-2"></i> Mes articles</a>
      @endif
      <a href="{{ route('user.settings') }}" class="side-button"><i class="fas fa-cog mr-2"></i> Paramètres</a>
      @if (Auth::user()->isAdmin)
        <a href="{{ route('administrator.index') }}" class="side-button btn-adm"><i class="fab fa-superpowers mr-2"></i> Administration</a>  
      @endif
    </div>
    <div class="side-disconnect">
      <a href="{{ route('logout') }}" class="side-button">
        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
      </a>
    </div>
  </div>
@endif
