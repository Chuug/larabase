<header class="topbar bg-dark"> 
    <div class="topbar-left">      
        <a href="{{ route('home') }}" class="navbar-brand text-light mb-0 ms-3 h1">
            <img src="{{ asset('img/logo.svg') }}" class="ml-3 pr-1 topbar-logo" alt="Logo">
            <span class="pr-1">{{ env('APP_NAME') }}</span>
        </a>
        <nav id="navigation">
            <a href="{{ route('home') }}">Home</a>
            <a href="#">Second</a>
        </nav>
    </div>
    <div class="topbar-right">
        <i id="navigation-icon" class="icon-responsive @if(Auth::check()) icon-responsive-connected @else icon-responsive-disconnected @endif text-light fa fa-lg fa-bars"></i>
        @if (!Auth::check())
            <nav class="nav-disconnected">
                <a href="{{ route('register') }}" class="btn btn-outline-light mr-2">Inscription</a>
                <a href="{{ route('login') }}" class="btn btn-light mr-2">Connexion</a>
            </nav>
        @else
            <nav class="nav-connected">
                <button class="toggle-sidebar">
                    <img src="/storage/users/avatar/{{ Auth::user()->id }}.png" class="rounded-circle nav-avatar avatar-sized mx-auto" id="side-user" alt="avatar">   
                </button>
            </nav>
        @endif  
    </div>   
</header>
