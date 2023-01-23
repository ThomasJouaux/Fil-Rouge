<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    #[Route('/edit/{user}', name: 'app_user_edit')]
    public function edit(Request $request ,EntityManagerInterface $manager ): Response
    {   
        $user = $this->getUser();
      
       if(!$this->getUser()){
           return $this->redirectToRoute('app_login');
        }
        if($this->getUser()!==$user){
            return $this->redirectToRoute('app_profile');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success', 
                'Les modifications de votre profil ont bien ete prise en compte'
            );
            return $this->redirectToRoute('app_profile');
            // return $this->redirect('app_profile');
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
