<?php
namespace App\Classes;
use Jenssegers\Agent\Agent;

class DevideDetect
{

    public static function isIOS()
    {
        $agent = new Agent();
        return $agent->is('OS X') || $agent->is('iPhone');
    }

}
