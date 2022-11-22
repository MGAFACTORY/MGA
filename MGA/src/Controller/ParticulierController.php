<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Particulier;
use App\Form\ParticulierType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
// use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class ParticulierController extends AbstractController
{
    #[Route('accueil/inscription/particulier', name: 'app_inscription_particulier')]
    public function form(ManagerRegistry $doctrine,Request $request,UserPasswordHasherInterface $passwordHasher): Response
    {
        $entityManager= $doctrine->getManager();
        $particulier= new Particulier();
        $form = $this->createForm(ParticulierType::class, $particulier);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $particulier = $form->getData();
            $hash = $passwordHasher->hashPassword($particulier, $particulier->getPassword());
            $particulier->setPassword($hash);
            $entityManager->persist($particulier);
            $entityManager->flush();
            //return $this->redirectToRoute("app_accueil_inscription_reussi");
            return $this->redirect("/accueil/inscription/reussi/particulier");
        }            
            
        return $this->render('particulier/formParticulier.html.twig', [
            'controller_name' => 'ParticulierController',
            'formParticulier'=>$form->createView()
        ]);
    }

    
}
   
        
