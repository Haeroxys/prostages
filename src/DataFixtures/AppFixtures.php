<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $forma = new Formation();
        $forma->setNomCourt('ABC');
        $forma->setNomLong('AaBéCé');
        $manager->persist($forma);

        $manager->flush();
    }
}
