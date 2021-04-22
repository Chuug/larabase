<a href="{{ route($route) }}" class="side-button-adm @if(request()->route()->getAction()['as'] == '{{ $route }}') active @endif" data-toggle="tooltip-adm" data-placement="right" title="{{ $title }}">
   <i class="{{ $icon }} fa-fw mr-1"></i> 
   <span class="d-none d-sm-inline">{{ $title }}</span>
</a>