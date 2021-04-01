<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Produits;
use App\Manager\DesignManager;
use App\Manager\MeowManager;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use function MongoDB\BSON\toJSON;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
        ]);
    }

    /**
     * @Route("/produits", name="api_produits_show")
     */
    public function webProduits(ProduitRepository $produitRepository): Response
    {
        return $this->toJson($produitRepository->findAll());
    }

    /**
     * @Route("/clients", name="api_clients_show")
     */
    public function webClients(ClientRepository $clientRepository): Response
    {
        return $this->toJson($clientRepository->findAll());
    }

    /**
     * @Route("/produits/{id}", name="api_produits_show_id")
     */
    public function webProduitByID(Produits $produits): Response
    {
        return $this->toJson($produits);
    }

    /**
     * @Route("/clients/{id}", name="api_clients_show_id")
     */
    public function webClientByID(Client $client): Response
    {
        return $this->toJson($client);
    }

    public function toJson($object): Response
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $response = new Response();
        $response->setContent($serializer->serialize($object, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
