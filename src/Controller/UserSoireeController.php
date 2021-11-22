<?php

namespace App\Controller;

use App\Entity\UserSoiree;
use App\Form\UserSoireeType;
use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserSoireeController extends AbstractController
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

    #[Route('/soiree/detail/{id}/select_nb', name: 'select_nb')]
    public function select_nb(Request $request, SessionInterface $session, RequestStack $requestStack): Response
    {
        $nbGuests = $request->request->getInt('nbGuests');
        if ($nbGuests) {
            $session->set('nbGuests', $nbGuests);
            return $this->redirectToRoute('add_guests', [
                'id' => $requestStack->getSession()->get('soiree')
            ]);
        }
        return $this->render('user_soiree/select_nb.html.twig', [
            'soiree' => $requestStack->getSession()->get('soiree'),
        ]);
    }


    #[Route('/soiree/detail/{id}/add_guests', name: 'add_guests')]
    public function ajout($id, SessionInterface $session, Request $request, RequestStack $requestStack): Response
    {
        $nbGuests = $requestStack->getSession()->get('nbGuests');
        $form = $this->createForm(UserSoireeType::class, null, [
            'nbGuests' => $nbGuests,
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $soiree = $this->soireeRepo->findOneBy(['id'=>$id]);
            $guestsDatas = $form->getData();
            $countGuestsDatas = count($guestsDatas) + 1;
            for ($i = 1; $i < $countGuestsDatas ; $i++) {
                for ($j = $i + 1; $j < $countGuestsDatas; $j++) {
                    if (($guestsDatas["player" . $i]->getId()) == ($guestsDatas["player" . $j]->getId())) {
                        $this->addflash(
                            'danger',
                            "Un même joueur est sélectionné au moins deux fois !"
                        );
                        return $this->render('user_soiree/add_guests.html.twig', [
                            'form' => $form->createView(),
                        ]);
                    }
                }
            }
            foreach ($guestsDatas as $guestsData) {
                $userSoiree = new UserSoiree();
                $userSoiree->setUser($guestsData);
                $userSoiree->setSoiree($soiree);
                $userSoiree->setIsGuest(true);
                $userSoiree->setIsHost(false);
                $this->manager->persist($userSoiree);
            }
            $this->manager->flush();
            $this->addflash(
                'success',
                "Les invités ont bien été enregistrés !"
            );

            return $this->redirectToRoute('soiree', [
                'soiree' => $soiree,
                'host' => $this->userRepo->findOneBy(['id' => $soiree->getCreatorId()]),
                'id' => $soiree->getId()
            ]);
        }
        return $this->render('user_soiree/add_guests.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
