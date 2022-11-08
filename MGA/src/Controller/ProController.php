<?php

namespace App\Controller;

use App\Entity\Pro;
use App\Form\ProType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class ProController extends AbstractController
{
    #[Route('accueil/inscription/pro', name: 'app_inscription_pro')]
    public function form(ManagerRegistry $doctrine,Request $request,UserPasswordHasherInterface $passwordHasher): Response
    {
        $entityManager= $doctrine->getManager();
        $pro = new Pro();
        $form= $this->createForm(ProType::class, $pro);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $pro = $form->getData();
            $hash = $passwordHasher->hashPassword($pro, $pro->getPassword());
            $pro->setPassword($hash);
            $entityManager->persist($pro);
            $entityManager->flush();
            return $this->redirect('/accueil/inscription/reussi/pro');
        }  

        return $this->render('pro/formPro.html.twig', [
            'controller_name' => 'ProController',
            'formPro'=>$form->createView()
        ]);
    }
}
