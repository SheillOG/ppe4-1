<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Manager\MeowManager;
use App\Manager\DesignManager;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig',
            array_merge(
                MeowManager::load(),
                DesignManager::load(),
                ["ct_name" => MeowManager::$accueil]
            ));
    }
}