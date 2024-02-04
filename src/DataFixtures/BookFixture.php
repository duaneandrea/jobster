<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BookFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $numBooks = 20;

        for ($i=0; $i<$numBooks; $i++){
            $faker = Factory::create();
            $book = new Book();
            $book->setBookName($faker->lastName);
            $book->setBookURL("https://google.com");
            $book->setCoverURL("https://google.com");
            $book->setNumPages(rand(100,400));
            $manager->persist($book);

        }

        $manager->flush();
    }
}
