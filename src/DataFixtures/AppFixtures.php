<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Questions;
use App\Entity\Answers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');
        //users 
        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {
            $user = new Users();
            $user->setName($faker->name);
            $manager->persist($user);

            $question = new Questions();
            $question->setTitle($faker->title);
            $question->setContent($faker->realText);
            $question->setUser($user);
            $manager->persist($question);

            $answer = new Answers();
            $answer->setContent($faker->realText);
            $answer->setStatus($faker->boolean);
            $answer->setQuestion($question);
            $manager->persist($answer);
        }

        //answers
        $manager->flush();
    }
}
