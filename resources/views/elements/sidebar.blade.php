@if (Auth::check())
  <div id="mySidenav" class="sidenav bg-dark">
    <div class="text-center">
        <img src="storage/users/avatar/{{ Auth::user()->id }}.png" class="rounded-circle avatar-side avatar-shadow mt-4 mb-1" id="side-user" alt="avatar">   
        <h6 class="text-light">{{ Auth::user()->name }}</h6>
    </div>
    <div class="side-menu mt-3">
      <a href="{{ route('user.settings') }}" class="side-button"><i class="fas fa-cog mr-2"></i> Settings</a>
      <a href="{{ route('administrator.index') }}" class="side-button btn-adm"><i class="fab fa-superpowers mr-2"></i> Administration</a>
    </div>
    <div class="side-disconnect">
      <a href="{{ route('logout') }}" class="side-button">
        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
      </a>
    </div>
  </div>
@endif
