<nav class="side-adm">
    <a href="{{ route('home') }}" class="back-home" data-toggle="tooltip-adm" data-placement="right" title="Home"><i class="fas fa-home mr-1"></i> <span class="d-none d-sm-inline">Home</span></a>
    <hr class="my-0">
    <a href="{{ route('administrator.index') }}" class="side-button-adm @if(request()->route()->getAction()['as'] == 'administrator.index') active @endif" data-toggle="tooltip-adm" data-placement="right" title="Dashboard"><i class="fas fa-chart-line mr-1" style="width: 20px"></i> <span class="d-none d-sm-inline">Dashboard</span></a>
    <a href="{{ route('administrator.users.manage') }}" class="side-button-adm @if(request()->route()->getAction()['as'] == 'administrator.users.manage') active @endif" data-toggle="tooltip-adm" data-placement="right" title="Utilisateurs"><i class="fas fa-users mr-1"></i> <span class="d-none d-sm-inline">Utilisateurs</span></a>  
</nav>