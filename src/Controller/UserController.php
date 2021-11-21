<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    #[Route('/profile/{id}', name: 'profile')]
    public function profile($id): Response
    {
        $user = $this->userRepo->findOneBy(['id' => $id]);
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user,
        ]);
    }
}