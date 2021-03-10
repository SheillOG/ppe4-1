<?php

namespace App\Manager;

class MeowManager
{

    public static function load()
    {
        return [
            '_name' => 'MeowFood',
            '_title' => 'Accueil',
            '_title_login' => 'MeowFood | Connexion',
            '_login_name' => 'Connexion',
            '_logout_name' => 'Déconnexion',
            '_login' => 'Utilisateur ou Email',
            '_password' => 'Mot de passe',
            '_forgot_password' => 'Mot de passe oublié ?',
        ];
    }
}
