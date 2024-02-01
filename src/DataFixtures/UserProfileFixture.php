<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\UserProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserProfileFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
/*        $user = new User();
        $profile = new UserProfile();
        $profile->setFirstName("Simbarashe Duane Andrea");
        $manager->persist($profile);

        $manager->flush();*/
    }
}
