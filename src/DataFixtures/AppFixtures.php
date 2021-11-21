<?php

namespace App\DataFixtures;

use App\Repository\SoireeRepository;
use App\Repository\UserRepository;
use App\Repository\UserSoireeRepository;
use Faker;
use App\Entity\User;
use App\Entity\Soiree;
use App\Entity\UserSoiree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    // Propriétés
    private UserRepository $userRepo;
    private SoireeRepository $soireeRepo;
    private UserSoireeRepository $userSoireeRepo;
    private UserPasswordHasherInterface $passwordHasher;

    // Constructeur
    public function __construct(UserRepository $userRepo, SoireeRepository $soireeRepo, UserSoireeRepository $userSoireeRepo, UserPasswordHasherInterface $passwordHasher)
    {
        $this->userRepo = $userRepo;
        $this->soireeRepo = $soireeRepo;
        $this->userSoireeRepo = $userSoireeRepo;
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // 1 - Je crée mes utilisateurs

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setPrenom($faker->firstName())
                ->setRoles(["ROLE_USER"])
                ->setNom($faker->lastName())
                ->setEmail($faker->email())
                ->setPassword($this->passwordHasher->hashPassword($user, 'password'))
                ->setCreatedAt($faker->dateTimeBetween('-1 years', 'now'));
            $manager->persist($user);
            $manager->flush();
            for ($j = 0; $j < 4; $j++) {
                $soiree = new Soiree();
                $userId = $user->getId();
                $soiree->setCreatedAt($faker->dateTimeBetween('-1 month', 'now'))
                    ->setDate($faker->dateTimeBetween('now', '+ 1month'))
                    ->setCreatorId($userId);
                $manager->persist($soiree);
                $manager->flush();
                $userSoiree = new userSoiree();
                $userSoiree->setIdSoiree($soiree)
                    ->setIdUser($user)
                    ->setIsHost(true)
                    ->setIsGuest(false);
                $manager->persist($userSoiree);
                $manager->flush();

            }
        }


    }

}