<?php


namespace App\Manager;


use App\Entity\Categories;
use App\Repository\ProduitRepository;

class ProductManager
{

    public static function getProducts(ProduitRepository $produitRepository) {
        return $produitRepository->findAll();
    }

    public static function getProductsCategory(Categories $categorie, ProduitRepository $produitRepository) {
        return $produitRepository->findAll($categorie);
    }

}