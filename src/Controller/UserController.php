<?php

namespace App\Controller;

use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    private SoireeRepository $soireeRepo;
    private UserRepository $userRepo;
    private EntityManagerInterface $manager;

    public function __construct(SoireeRepository $soireeRepo, UserRepository $userRepo, EntityManagerInterface $manager)
    {
        $this->soireeRepo = $soireeRepo;
        $this->userRepo = $userRepo;
        $this->manager = $manager;
    }

    #[Route('/profile/{id}', name: 'profile')]
    public function profile($id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user = $this->userRepo->findOneBy(['id' => $id]);
        $soireesCrees = $this->soireeRepo->findBy(['creatorId' => $id]);
        $allSoirees = count($soireesCrees);
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'UserController',
            'soireesCrees' => $soireesCrees,
            'allSoirees' => $allSoirees,
            'user' => $user,
        ]);
    }
}