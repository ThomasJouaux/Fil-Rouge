<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShoesIslandController extends AbstractController
{
    #[Route('/', name: 'app_shoes_island')]
    public function index(CategorieRepository $repo , ProduitRepository $repoPro ): Response
    {
        $categories = $repo->findAll();
        $pro = $repoPro->findAll();

        return $this->render('shoesIsland/index.html.twig', [
            'controller_name' => 'ShoesIslandController',
            'categories' => $categories,
            'produit' => $pro,
        ]);
    }

    #[Route('/categorie/{id}', name: 'app_categorie')]
    public function categorie(SousCategorieRepository $repo, $id): Response
    {
        $liste = $repo->findBy([ "Categorie" => $id]);

        // dd($categorie);
        return $this->render('shoesIsland/categorie.html.twig', [
            'liste' => $liste
        ]);
    }

    #[Route('/produits/{id}', name: 'app_produits')]
    public function produits(ProduitRepository $repo, $id): Response
    {
        $liste = $repo->findBy([ "SousCategorie" => $id]);

        // dd($categorie);
        return $this->render('shoesIsland/produit.html.twig', [
            'liste' => $liste
        ]);
    }

}