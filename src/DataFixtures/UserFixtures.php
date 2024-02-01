<?php

namespace App\DataFixtures;

use App\Entity\UserProfile;
use App\Helpers\HelperClass;
use App\Repository\CountriesRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\Intl\Countries;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher, private CountriesRepository $countriesRepository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $user = new User();
        $country = $this->countriesRepository->find(239);
        $user->setEmail(strtolower($faker->email));
        $hashedPassword = $this->userPasswordHasher->hashPassword($user,'password');
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        //create user Profiile
        $profile = new UserProfile();
        $profile->setFirstName($faker->firstNameMale);
        $profile->setLastName($faker->lastName);
        $profile->setCellNumber($faker->phoneNumber);
        $profile->setWhatsApp("+263782662405");
        $profile->setHouseAddress($faker->address);
        $profile->setUserBio("Accomplished full-stack developer with 8+ years experience in creating high-performance, scalable web applications using PHP Laravel, PHP Symfony, Vue.js, and Java Spring Framework. Expertise in designing APIs, optimizing databases, and implementing complex features. Proven ability to deliver solutions on tight deadlines. Seeking a full-stack or backend development role.");
        $profile->setGender("male");
        $profile->setLanguage(UserProfile::LANG_ENGLISH);
        $profile->setCountryId($country);
        $profile->setApprovalStatusId(UserProfile::STATUS_APPROVED);
        $profile->setIpAddress($faker->ipv4);
        $profile->setRecordHash(HelperClass::getHash());
        $profile->setUserId($user);
        $manager->persist($profile);


        $manager->flush();
    }
}
