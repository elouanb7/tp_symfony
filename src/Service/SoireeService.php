<?php

namespace App\Service;

use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use App\Repository\UserSoireeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $usersSoiree = $this->userSoireeRepo->findBy(['soiree' => $soireeId]);
        $guests = $this->requestStack->getSession()->get('guests');
        $host = $this->requestStack->getSession()->get('host');

        dump($usersSoiree);
        $moneySpent = null;
        foreach ($usersSoiree as $userSoiree) {
            $moneySpent += $userSoiree->getExpenses();
        }
        $soiree->setMoneySpent($moneySpent);
        $averagePerUser = $moneySpent / count($usersSoiree);
        $soiree->setAveragePerUser($averagePerUser);
        $soiree->setNbUsers(count($usersSoiree));
        $this->manager->persist($soiree);
        foreach ($usersSoiree as $userSoiree) {
            $expenses = $userSoiree->getExpenses();
            $averagePerUser = $soiree->getAveragePerUser();
            $debts = $averagePerUser - $expenses;
            $userSoiree->setDebts($debts);
            $this->manager->persist($userSoiree);
        }
        $this->manager->flush();
    }

}

;
