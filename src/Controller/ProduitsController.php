<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Manager\DesignManager;
use App\Manager\MeowManager;
use App\Repository\ProduitRepository;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


/**
 * @Route("/produits")
 */
class ProduitsController extends AbstractController
{
    /**
     * @Route("/", name="produits", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produits/index.html.twig',
            array_merge(
                MeowManager::load(),
                DesignManager::load(),
                ["produits" => $produitRepository->findAll()],
                ["ct_name" => MeowManager::$produit]
            ));
    }

    /**
     * @Route("/new", name="produits_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produits');
        }


        return $this->render('produits/new.html.twig',  array_merge(
            MeowManager::load(),
            DesignManager::load(),
            ["produit" => $produit],
            ["ct_name" => MeowManager::$produit],
            ["form" => $form->createView(),]
        ));
    }

    /**
     * @Route("/{idproduit}", name="produits_show", methods={"GET"})
     */
    public function show(Produits $produit): Response
    {
        return $this->render('produits/show.html.twig', array_merge(
            MeowManager::load(),
            DesignManager::load(),
            ["produit" => $produit],
            ["ct_name" => MeowManager::$produit_show]
        ));
    }

    /**
     * @Route("/{idproduit}/edit", name="produits_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produits $produit): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produits');
        }

        return $this->render('produits/edit.html.twig', array_merge(
            MeowManager::load(),
            DesignManager::load(),
            ["produit" => $produit],
            ["ct_name" => MeowManager::$produit_edit],
            ['form' => $form->createView()]
        ));
    }

    /**
     * @Route("/{idproduit}", name="produits_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produits $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getIdproduit(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produits');
    }

    /**
     * @Route("/{idproduit}/remove", name="produits_delete", methods={"POST"})
     */
    public function deleteTest(Produits $produit): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($produit);
        $entityManager->flush();

        return $this->redirectToRoute('produits');
    }
}
