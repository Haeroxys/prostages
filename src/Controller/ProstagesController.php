<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_stages")
     */
    public function listerStages(): Response
    {
        //Récupérer le repository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        //Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('prostages/stages.html.twig', [
            'stages' => $stages,
        ]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function listerEntreprises(): Response
    {
        //Récupérer le repository de l'entité Entreprise
        $repositoryEntreprises = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les entreprises enregistrés en BD
        $entreprises = $repositoryEntreprises->findAll();

        //Envoyer les entreprises récupérés à la vue chargée de les afficher
        return $this->render('prostages/entreprises.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }

    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function listerFormations(): Response
    {
        //Récupérer le repository de l'entité Formation
        $repositoryFormations = $this->getDoctrine()->getRepository(Formation::class);

        //Récupérer les entreprises enregistrés en BD
        $formations = $repositoryFormations->findAll();

        //Envoyer les entreprises récupérés à la vue chargée de les afficher
        return $this->render('prostages/formations.html.twig', [
            'formations' => $formations,
        ]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stagDetail")
     */
    public function afficherStageDetail($id): Response
    {

        return $this->render('prostages/stageDetail.html.twig', [
            'idStage' => $id,
        ]);
    }
}
