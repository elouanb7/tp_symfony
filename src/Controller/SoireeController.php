<?php

namespace App\Controller;

use App\Entity\Soiree;
use App\Entity\User;
use App\Entity\UserSoiree;
use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use App\Form\SoireeType;
use App\Repository\UserSoireeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class SoireeController extends AbstractController
{
    private SoireeRepository $soireeRepo;
    private UserRepository $userRepo;
    private UserSoireeRepository $userSoireeRepo;
    private EntityManagerInterface $manager;
    private SessionInterface $session;

    public function __construct(SoireeRepository $soireeRepo, UserRepository $userRepo, UserSoireeRepository $userSoireeRepo, EntityManagerInterface $manager, SessionInterface $session)
    {
        $this->soireeRepo = $soireeRepo;
        $this->userRepo = $userRepo;
        $this->userSoireeRepo = $userSoireeRepo;
        $this->manager = $manager;
        $this->session = $session;
    }

    #[Route('/soiree/detail/{id}', name: 'soiree')]
    public function Soiree($id, RequestStack $requestStack, Request $request): Response
    {
        $this->session->set('soiree', $id);
        $this->denyAccessUnlessGranted('ROLE_USER');
        $soiree = $this->soireeRepo->findOneBy(['id' => $id]);
        $host = $this->userRepo->findOneBy(['id' => $soiree->getCreatorId()]);
        $guestsUserSoiree = $this->userSoireeRepo->findBy(['soiree' => $soiree]);
        $guests = [];
        foreach ($guestsUserSoiree as $guest){
            $guestId = $guest->getUser()->getId();
            $user = $this->userRepo->findOneBy(['id' => $guestId]);
            array_push($guests, $user);
        }

        return $this->render('soiree/soiree.html.twig', [
            'soiree' => $soiree,
            'host' => $host,
            'guests' => $guests
        ]);
    }


    #[Route('/soiree/create', name: 'soiree_create')]
    public function createSoiree(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $soiree = new Soiree();
        $form = $this->createForm(SoireeType::class, $soiree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $soiree = $form->getData();
            $soiree->setCreatedAt(new \DateTime('now'));
            $host = $this->getUser()->getUserIdentifier();
            $host = $this->userRepo->findOneBy(['email' => $host]);
            $soiree->setCreatorId($host->getId());
            $this->manager->persist($soiree);
            $userSoiree = new UserSoiree();
            $userSoiree->setUser($host);
            $userSoiree->setSoiree($soiree);
            $userSoiree->setIsGuest(false);
            $userSoiree->setIsHost(true);
            $this->manager->persist($userSoiree);
            $this->manager->flush();
            $this->addflash(
                'success',
                "La nouvelle soirée à bien été enregistrée !"
            );
            return $this->redirectToRoute('soiree', [
                'id' => $soiree->getId(),
                'soiree' => $soiree,
            ]);
        }
        return $this->render('soiree/soiree_create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
