<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            AccueilController::index2()
        ]);
    }

    public static function index2()
    {
        return [
            'ppe_title' => 'MeowFood',
            'ppe_title_login' => 'MeowFood | Connexion',
            'ppe_accueil' => 'Accueil',
            'ppe_login' => 'Connexion',
            'ppe_logout' => 'Déconnexion',
            'ppe_forgot_password' => 'Mot de passe oublié',


            'button_login' => 'mt-3 text-lg font-semibold bg-green-500 w-full text-white rounded-lg px-6 py-2 shadow-xl hover:text-white hover:bg-green-600',
        ];
    }
}
