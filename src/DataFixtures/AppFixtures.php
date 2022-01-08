<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Création d'un générateur de données faker
        $faker = \Faker\Factory::create('fr_FR');
        
        $nbFormation = 5;

        for ($i=0; $i < $nbFormation; $i++) {
            $forma = new Formation();
            $forma->setNomCourt($faker->regexify('[A-Z]{3}'));
            $forma->setNomLong($faker->realText($maxNbChars = 50, $indexSize = 2));
            $manager->persist($forma);
        }

        $manager->flush();
    }
}
