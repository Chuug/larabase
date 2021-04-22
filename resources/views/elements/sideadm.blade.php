<nav class="side-adm">
   <a href="{{ route('home') }}" class="back-home" data-toggle="tooltip-adm" data-placement="right" title="Home"><i class="fas fa-home mr-1"></i> <span class="d-none d-sm-inline">Home</span></a>
   <hr class="my-0">
   <x-adm.buttons title="Dashboard" icon="fas fa-chart-line" route="administrator.index"/>
   <x-adm.buttons title="Utilisateurs" icon="fas fa-users" route="administrator.users.manage"/>
</nav>