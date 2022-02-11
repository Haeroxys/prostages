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
        $stages = $repositoryStage->findAllStagesEtEntreprisesEtFormations();

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

        //Envoyer les formations récupérés à la vue chargée de les afficher
        return $this->render('prostages/formations.html.twig', [
            'formations' => $formations,
        ]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stageDetails")
     */
    public function afficherStageDetails($id): Response
    {
        //Récupérer le repository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les stages enregistrés en BD
        $stage = $repositoryStage->findStageById($id);

        return $this->render('prostages/stageDetails.html.twig', [
            'stage' => $stage,
        ]);
    }

    /**
     * @Route("/entreprises/ajouter", name="prostages_formulaireAjoutEntreprise")
     */
    public function afficherFormulaireAjoutEntreprise(): Response
    {
        //création d'une nouvelle entreprise
        $entreprise = new Entreprise();

        //création d'un objet formulaire pour saisir une entreprise
        $formulaireEntreprise = $this -> createFormBuilder($entreprise)
                                      -> add('nom')
                                      -> add('adresse')
                                      -> add('activite')
                                      -> add('urlSite')
                                      -> getForm();
        ;

        //affichage de la page d'ajout d'une entreprise
        return $this->render('prostages/formulaireAjoutEntreprise.html.twig', [
            'vueFormulaireEntreprise' => $formulaireEntreprise -> createView()
        ]);
    }

    /**
     * @Route("/entreprises/{id}", name="prostages_stagesParEntreprise")
     */
    public function afficherStagesParEntreprise($id): Response
    {
        //Récupérer le repository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les stages enregistrés en BD
        $entreprise = $repositoryEntreprise->findByEntrepriseId($id);

        return $this->render('prostages/stagesParEntreprise.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
    
    /**
     * @Route("/formations/{id}", name="prostages_stagesParFormation")
     */
    public function afficherStagesParFormation($id): Response
    {
        //Récupérer le repository de l'entité Formation
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        //Récupérer les stages enregistrés en BD
        $formation = $repositoryFormation->findByFormationId($id);

        return $this->render('prostages/stagesParFormation.html.twig', [
            'formation' => $formation,
        ]);
    }
}
