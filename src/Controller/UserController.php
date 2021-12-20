<?php

namespace App\Controller;

use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $soireesCrees = $this->soireeRepo->findBy(['creatorId' => $id], [], 6);
        $allSoirees = count($soireesCrees);
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'UserController',
            'soireesCrees' => $soireesCrees,
            'allSoirees' => count($this->soireeRepo->findBy(['creatorId' => $id])),
            'user' => $user,
        ]);
    }

    #[Route('/profile/{id}/soirees', name: 'soirees')]
    public function soirees($id, Request $request, PaginatorInterface $paginator): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user = $this->userRepo->findOneBy(['id' => $id]);
        $soireesCrees = $this->soireeRepo->findBy(['creatorId' => $id]);
        $allSoirees = count($soireesCrees);

        $pagination = $paginator->paginate(
            $soireesCrees,
            $request->query->getInt('page', 1),
            6
        );

        $pagination->setTemplate('ressources/twitter_bootstrap_v4_pagination.html.twig');
        $pagination->setCustomParameters([
            'align' => 'center', # center|right (for template: twitter_bootstrap_v4_pagination and foundation_v6_pagination)
            'style' => 'bottom',
            'span_class' => 'whatever',
        ]);
        return $this->render('user/soirees.html.twig', [
            'controller_name' => 'UserController',
            'soireesCrees' => $soireesCrees,
            'allSoirees' => $allSoirees,
            'pagination' => $pagination,
            'user' => $user,
        ]);
    }
}