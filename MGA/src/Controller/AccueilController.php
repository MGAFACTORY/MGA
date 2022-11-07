<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/accueil/inscription', name: 'app_accueil_inscription')]
    public function inscription():Response{

        return $this->render('accueil/inscription.html.twig',[
            'controller_name' => 'AccueilController',
        ]);
    }
}
