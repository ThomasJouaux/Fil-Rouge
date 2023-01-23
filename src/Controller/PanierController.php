<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/add/{id}', name: 'app_add')]
    public function add(SessionInterface $session, ProduitRepository $repo, $id): Response
    {


        $tab = $session->get("panier", []);

        $p = null;
        foreach ($tab as $produit) {
            if ($produit->getId() == $id) {
                $p = $produit;
            }
        }

        if ($p == null) {
            $p = $repo->find($id);
            $p->quantite = 1;
            $tab[] = $p;

        } else {
            $p->quantite++;
        }



        $session->set("panier", $tab);

        //         dd($tab);

        return $this->redirect("/panier");

    }

    #[Route('/sub/{id}', name: 'app_sub')]
    public function sub(SessionInterface $session, ProduitRepository $repo, $id): Response
    {

        $tab = $session->get("panier", []);

        $p = null;
        foreach ($tab as $produit) {
            if ($produit->getId() == $id) {
                $p = $produit;
            }
        }

        if ($p == null) {
            $p = $repo->find($id);
            $p->quantite = 1;
            $tab[] = $p;
        } else {
            $p->quantite--;
            if ($p->quantite <= 0) {
                array_pop($tab);
            }
        }



        $session->set("panier", $tab);

        //         dd($tab);

        return $this->redirect("/panier");

    }

    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session): Response
    {

        $panier = $session->get("panier", []);

        $nb = 0;
        $tva = 0;

        foreach ($panier as $value) {
            $nb += ($value->getPrixProduit() * $value->quantite);
            $tva += ($value->getPrixProduit() * $value->getTvaProduit() / 100) * $value->quantite;
        }
        ;
        $prixProduitFinal = $nb + $tva;
        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
            'total' => $nb,
            'tva' => $tva,
            'prixTtc' => $prixProduitFinal,
        ]);
    }

    #[Route('/clear', name: 'app_clear')]
    public function clear(SessionInterface $session): Response
    {
        $panier = $session->set("panier", []);

        return $this->redirect("/panier");
    }

    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(SessionInterface $session , ProduitRepository $repo, $id): Response
    {

        $tab = $session->get("panier", []);

        $p = null;
        foreach ($tab as $produit) {
            if ($produit->getId() == $id) {
                $p = $produit;
                
            }
        }
            // $p = $repo->find($id);
            // dd($p);
            $tab[] = $p;
            array_pop($tab);
        
        
        return $this->redirect("/panier");

    }
        
    #[Route('/suppr/{id}', name: 'app_delete')]
    public function suppr(SessionInterface $session , ProduitRepository $repo, $id): Response
    {

        $tab = $session->get("panier", []);

        $p = null;
        foreach ($tab as $produit) {
            if ($produit->getId() == $id) {
                $p = $produit;
               array_pop($p);
                }
            }
            return $this->redirect("/panier");
        }
            // $p = $repo->find($id);
            // dd($p);
        

    
}
