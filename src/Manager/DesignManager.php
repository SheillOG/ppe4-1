<?php

namespace App\Manager;

class DesignManager
{

    public static function load()
    {
        return [
            '_dropdown' => 'RIEN',
            '_button' => StyleManager::$button,
            '_button_login' => StyleManager::$button_login,
            '_button_logout' => StyleManager::$button_logout,
            '_button_nav' => StyleManager::$button_nav,
        ];
    }
}
