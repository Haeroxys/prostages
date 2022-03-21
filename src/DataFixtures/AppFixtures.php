<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //Création de 2 utilisateurs de test
        $utilisateur = new User();
        $utilisateur->setNom("Nune nies");
        $utilisateur->setUsername("Nunez");
        $utilisateur->setRoles(['ROLE_USER']);
        $utilisateur->setPassword('$2y$10$7HgapABCkHAa2UMGunPVounGvAtmVJqbZnpWdiOgsmu0PoyKLYAy.');
        $manager->persist($utilisateur);

        $admin = new User();
        $admin->setNom("Les derts");
        $admin->setUsername("Leydert");
        $admin->setRoles(['ROLE_USER','ROLE_ADMIN']);
        $admin->setPassword('$2y$10$ItB1PkG.aOlfwbVe9QYAXu76w5WYQ6DGMemJbZMd16mEGdepgtnry');
        $manager->persist($admin);

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

            $tableauDEntreprise[] = $entreprise;

            $manager->persist($entreprise);
        }

        //stages
        $nbStage = 20;

        for ($i=0; $i < $nbStage; $i++) { 
            $stage = new Stage();
            $stage->setTitre($faker->realText($maxNbChars = 50, $indexSize = 2));
            $stage->setDescMission($faker->realText($maxNbChars = 100, $indexSize = 2));
            $stage->setEmailContact($faker->email());
            $stage->setEntreprises($faker->randomElement($tableauDEntreprise));

            $nombreDeFormationsConcernees = $faker->numberBetween(1,3);
            $formationsPouvantEtreChoisies = $tableauDeFormation;
            for ($y=0; $y < $nombreDeFormationsConcernees; $y++) { 
                $indiceFormation = $faker->numberBetween(0, count($formationsPouvantEtreChoisies)-1);
                $formationAssocieeAuStage = $formationsPouvantEtreChoisies[$indiceFormation];
                $stage->addFormation($formationAssocieeAuStage);
                array_splice($formationsPouvantEtreChoisies, $indiceFormation, 1);
            }

            $manager->persist($stage);
        }

        $manager->flush();
    }
}
