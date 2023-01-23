<?php

namespace App\Controller;


use App\Entity\Commande;
use App\Entity\SeCompose;
use App\Entity\AdresseLivraison;
use App\Form\AdresseLivraisonFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdresseLivraisonController extends AbstractController
{
    #[Route('/adresseLivraison', name: 'app_adresse_livraison')]
    public function addAdresseLivraison(Request $request, SeCompose $seCompose ,ManagerRegistry $manager)
    {
        $id = $this->$seCompose->getId();
        $adresseLivraison = new AdresseLivraison();
        $form = $this->createForm(AdresseLivraisonFormType::class, $adresseLivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seCompose->addAdresseLivraison($adresseLivraison);
            $entityManager = $manager->getManager();
            $entityManager->persist($adresseLivraison);
            $entityManager->flush();

            return $this->redirectToRoute('app_profile', ['id' => $id]);
        }

        return $this->render('commande/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
