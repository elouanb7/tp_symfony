<?php

namespace App\Service;

use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use App\Repository\UserSoireeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SoireeService extends AbstractController
{
    private SoireeRepository $soireeRepo;
    private UserRepository $userRepo;
    private UserSoireeRepository $userSoireeRepo;
    private EntityManagerInterface $manager;
    private SessionInterface $session;
    private RequestStack $requestStack;

    public function __construct(SoireeRepository $soireeRepo, UserRepository $userRepo, UserSoireeRepository $userSoireeRepo, EntityManagerInterface $manager, SessionInterface $session, RequestStack $requestStack)
    {
        $this->soireeRepo = $soireeRepo;
        $this->userRepo = $userRepo;
        $this->userSoireeRepo = $userSoireeRepo;
        $this->manager = $manager;
        $this->session = $session;
        $this->requestStack = $requestStack;
    }

    public function update($soireeId)
    {
        $soiree = $this->soireeRepo->findOneBy(['id' => $soireeId]);
        $guests = $this->requestStack->getSession()->get('guests');
        $host = $this->requestStack->getSession()->get('host');
        $list = [];
        array_push($list, $guests);
        array_push($list, $host);
        dump($list);
    }

}

;
