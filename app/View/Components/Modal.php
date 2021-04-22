<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
   public $target;
   public $targetName;
   public $type;
   public $route;

   /**
    * Create a new component instance.
    *
    * @return void
    */
   public function __construct($target, $targetName, $type, $route)
   {
      $this->target = $target;
      $this->targetName = $targetName;
      $this->type = $type;
      $this->route = $route;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
   public function render()
   {
      return view('components.modal');
   }
}
