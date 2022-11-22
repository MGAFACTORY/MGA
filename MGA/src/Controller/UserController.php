<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProType;
use App\Form\UserType;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserController extends AbstractController
{
    #[Route('/accueil/inscription/user', name: 'app_utilisateur')]
    public function index(ManagerRegistry $doctrine,Request $request,UserPasswordHasherInterface $passwordHasher): Response
    {   
        $entityManager = $doctrine->getManager();
        $user = new User();
        $form = $this->createForm(Usertype::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $user = $form->getData();
            $hash = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hash);
            $entityManager->persist($user);
            $entityManager->flush();
            //return $this->redirectToRoute("app_accueil_inscription_reussi");
            return $this->redirect("/accueil/inscription/reussi/particulier");
        }      

        return $this->render('user/userForm.html.twig', [
            'controller_name' => 'UserController',
            'formUser'=>$form->createView()
        ]);
    }
}


