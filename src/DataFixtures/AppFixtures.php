<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private const PLAIN_PASSWORD = "motdepasse";
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        #region Users

        $alice = new User()
            ->setEmail("alice@example.fr")
            ->setCreatedAt(new \DateTimeImmutable());

        $password = $this->hasher->hashPassword($alice, self::PLAIN_PASSWORD);
        $alice->setPassword($password);

        $manager->persist($alice);

        $bob = new User()
            ->setEmail("bob@example.fr")
            ->setCreatedAt(new \DateTimeImmutable());

        $password = $this->hasher->hashPassword($bob, self::PLAIN_PASSWORD);
        $bob->setPassword($password);

        $manager->persist($bob);

        $camille = new User()
            ->setEmail("camille.aubert@example.fr")
            ->setFirstName("Camille")
            ->setLastName("Aubert")
            ->setCreatedAt(new \DateTimeImmutable("2026-02-04T09:00:00"));

        $password = $this->hasher->hashPassword($camille, self::PLAIN_PASSWORD);
        $camille->setPassword($password);

        $manager->persist($camille);

        #endregion Users

        $manager->flush();
    }
}
