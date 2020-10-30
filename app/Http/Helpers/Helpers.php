<?php

namespace App\Http\Helpers;

use DateTime;
use Illuminate\Routing\Route;

class Helpers 
{
    public static function getShortAction(Route $route)
    {
        return explode('@',$route->getActionName())[1];
    }

    public static function formatDate($date)
    {
        $dateTime = new DateTime($date);
        $dateYear = $dateTime->format('Y');
        $now = new DateTime();
        $nowYear = $now->format('Y');
        return $dateTime->format('d/m'.(($dateYear != $nowYear)?'/Y':'').' à H\hi');
    }
}