<?php

namespace App\Controller;

use App\Manager\ProductManager;
use App\Repository\ProduitRepository;
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
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('accueil/index.html.twig',
            array_merge(
                MeowManager::load(),
                DesignManager::load(),
                ["products" => ProductManager::getProducts($produitRepository)],
                ["ct_name" => MeowManager::$accueil]
            ));
    }
}