<?php

namespace App\Manager;

class DesignManager
{

    public static function load()
    {
        return [
            '_dropdown' => 'RIEN',
            '_button_login' => StyleManager::$button_login,
            '_button_logout' => StyleManager::$button_logout,
        ];
    }
}
