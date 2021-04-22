<?php

namespace App\View\Components\adm;

use Illuminate\View\Component;

class Buttons extends Component
{
   public $title;
   public $icon;
   public $route;
   /**
    * Create a new component instance.
    *
    * @return void
    */
   public function __construct($title, $icon, $route)
   {
      $this->title = $title;
      $this->icon = $icon;
      $this->route = $route;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
   public function render()
   {
      return view('components.adm.buttons');
   }
}
