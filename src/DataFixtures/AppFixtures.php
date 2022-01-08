<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Création d'un générateur de données faker
        $faker = \Faker\Factory::create('fr_FR');
        
        //formations
        $formationDUT = new Formation();
        $formationDUT->setNomCourt('DUT INFO');
        $formationDUT->setNomLong('Diplôme Universitaire de Technologie Informatique');

        $formationLPMN = new Formation();
        $formationLPMN->setNomCourt('LPMN');
        $formationLPMN->setNomLong('Licence Professionnelle Métiers du Numérique');

        $formationLPPA = new Formation();
        $formationLPPA->setNomCourt('LPPA');
        $formationLPPA->setNomLong('Licence Professionnelle Programmation Avancée');

        $tableauDeFormation = array($formationDUT,$formationLPMN,$formationLPPA);

        foreach ($tableauDeFormation as $formation) {
            $manager->persist($formation);
        }

        //entreprises
        
        $nbEntreprise = 10;

        for ($i=0; $i < $nbEntreprise; $i++) { 
            $entreprise = new Entreprise;
            $entreprise->setActivite(join(' ',$faker->words($nb = 2, $asText = false)));
            $entreprise->setAdresse($faker->address());
            $nomEntreprise = $faker->company();
            $entreprise->setNom($nomEntreprise);
            $URLEntreprise = 'https://www.'.strtolower(str_replace(' ', '-', str_replace('.', '', $nomEntreprise))).'.fr';
            $entreprise->setURLsite($URLEntreprise);

            $manager->persist($entreprise);
        }

        $manager->flush();
    }
}
