<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavController extends AbstractController
{
    public function index(CategorieRepository $repo , SessionInterface $session): Response
    {
        return $this->render('header.html.twig', [
            'categories' => $repo->findAll(),
            'panier' => $session->get("panier", [])
        ]);
    }
}
