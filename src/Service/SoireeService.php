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
        return 1;
    }

    public function tricount($soireeId)
    {
        $soiree = $this->soireeRepo->findOneBy(['id' => $soireeId]);
        $usersSoiree = $this->userSoireeRepo->findBy(['soiree' => $soireeId],['debts' => 'ASC']);
        $guests = $this->requestStack->getSession()->get('guests');
        $host = $this->requestStack->getSession()->get('host');
        $nbUsers = $soiree->getNbUsers();
        $nbUsers--;
        $count = 0;
        $max = $nbUsers;
        $tricount = [];
        while ($count != $nbUsers){
            $userSoiree1 = $usersSoiree[$count];
            $user1 = $userSoiree1->getUser();
            $userSoiree2 = $usersSoiree[$max];
            $user2 = $userSoiree2->getUser();
            $max--;
            $user1debts = $userSoiree1->getDebts();
            $user2debts = $userSoiree2->getDebts();
            array_push($tricount,"".$user2->getFullName()." doit donner ".$user2debts." à ".$user1->getFullName().".");
            $usersDebt = $user1debts + $user2debts;
            $userSoiree1->setDebts($usersDebt);
            $userSoiree2->setDebts(0);
            if ($usersDebt>=0){
                $count++;
                array_pop($usersSoiree);
            }
        }
        dd($tricount);

    }

}

;
