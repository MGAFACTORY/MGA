<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\ProType;
use App\Form\UserType;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_utilisateur')]
    public function index(): Response
    {
        $user = new User();
        $form = $this->createForm(Usertype::class, $user);
        return $this->render('user/userForm.html.twig', [
            'controller_name' => 'UserController',
            'formUser'=>$form->createView()
        ]);
    }
}


