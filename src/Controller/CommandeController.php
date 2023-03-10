<?php

namespace App\Controller;

use DateTime;
use DateTimeInterface;
use App\Entity\Commande;
use App\Entity\Livraison;
use App\Entity\SeCompose;
use App\Form\LivraisonType;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use App\Repository\SeComposeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[IsGranted("ROLE_USER")]
    #[Route('/commande', name: 'app_commande')]
    public function index(ProduitRepository $repo ,SessionInterface $session , EntityManagerInterface $manager): Response
    {
        $panier = $session->get("panier", []);
       
        $com = new Commande();
        $com->setUser($this->getUser());
        $com->setDateCommande(new DateTime());
        $manager->persist($com);

        


        foreach ($panier as $produit) {
            $p = $repo -> find($produit->getId());
            $sc = new SeCompose();
            $sc->setCommande($com);
            $sc->setProduit($p);
            $sc->setQuantite(5);
            $manager->persist($sc);
            $manager->flush();
        }
        $session->set("panier" , []);

        return $this->redirectToRoute("app_livraison");
    }

    #[IsGranted("ROLE_USER")]
    #[Route('/commandeDetail/', name: 'app_commandeDetail')]
    public function commandeDetail(ManagerRegistry $manager): Response
    {
        $user = $this->getUser();
        $commandes = $manager->getRepository(Commande::class)->findByUser($user);


        if (!$commandes) {
            throw $this->createNotFoundException(
                'Aucune commande trouvée pour cet id : '.$user->getUserIdentifier()
            );
        }
        //$produits = $manager->getRepository(SeCompose::class)->findBy(["commande" => $commande]);
       

        return $this->render('commande/index.html.twig', [
            'commandes' => $commandes, 
            //'produits' => $produits
        ]);
    }


    #[IsGranted("ROLE_USER")]
    #[Route('/livraison', name: 'app_livraison')]
    public function livraison(ProduitRepository $repo ,SessionInterface $session , EntityManagerInterface $manager , Request $request): Response
    {
        $livraison = new Livraison();
    $form = $this->createForm(LivraisonType::class, $livraison);
    $form->handleRequest($request);
    $user = $this->getUser();
    
    
    if ($form->isSubmitted() && $form->isValid()) {
       
        $commande = $manager->getRepository(Commande::class)->findOneBy(['user' => $user], ['id' => 'DESC']);
        $livraison->setCommande($commande);
        $adresse = $form["adresse"]->getData();
        $ville = $form["ville"]->getData();
        $codePostal = $form["cp"]->getData();
        $livraison->setDate(new DateTime());
        $livraison->setAdresse($adresse);
        $livraison->setVille($ville);
        $livraison->setCp($codePostal);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($livraison);
        $entityManager->flush();


        return $this->redirectToRoute('app_profile');
    }


    return $this->render('adresse_livraison/index.html.twig', [
        'form' => $form->createView(),
    ]);


    }
}
