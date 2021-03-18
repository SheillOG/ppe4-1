<?php

namespace App\Controller;

use App\Manager\DesignManager;
use App\Manager\MeowManager;
use App\Manager\ProductManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(): Response
    {
        return $this->render('panier/index.html.twig', array_merge(
            MeowManager::load(),
            DesignManager::load(),
            ["ct_name" => MeowManager::$panier]
        ));
    }
}
