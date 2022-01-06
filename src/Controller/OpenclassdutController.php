<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function accueil(): Response
    {
        return $this->render('prostages/accueil.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises(): Response
    {
        return $this->render('prostages/entreprises.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function formations(): Response
    {
        return $this->render('prostages/formations.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function stages($id): Response
    {
        return $this->render('prostages/stages.html.twig', [
            'controller_name' => 'ProstagesController',
            'idStage' => $id,
        ]);
    }
}
