<?php

namespace App\Manager;

class MeowManager
{

    public static $accueil = 'Accueil';
    public static $panier = 'Panier';
    public static $secutite = 'Securite';
    public static $ressource = 'Ressource';
    public static $account = 'Compte';

    public static function load()
    {
        return [
            '_DEV' => true,
            '_name' => 'Meow Food',
            '_footer' => 'Tout article acheté sur le site Meow Food ne sera pas remboursable.',

            /*
              Categories
            */
            '_accueil' => MeowManager::$accueil,
            '_ressource' => MeowManager::$ressource,
            '_account' => MeowManager::$account,
            '_panier' => MeowManager::$panier,

            '_product_look' => 'Voir le produit',

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
