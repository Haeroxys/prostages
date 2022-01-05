<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenclassdutController extends AbstractController
{
    /**
     * @Route("/", name="openclassdut_accueil")
     */
    public function accueil(): Response
    {
        return $this->render('openclassdut/accueil.html.twig', [
            'controller_name' => 'OpenclassdutController',
        ]);
    }

    /**
     * @Route("/entreprises", name="openclassdut_entreprises")
     */
    public function entreprises(): Response
    {
        return $this->render('openclassdut/entreprises.html.twig', [
            'controller_name' => 'OpenclassdutController',
        ]);
    }

    /**
     * @Route("/formations", name="openclassdut_formations")
     */
    public function formations(): Response
    {
        return $this->render('openclassdut/formations.html.twig', [
            'controller_name' => 'OpenclassdutController',
        ]);
    }

    /**
     * @Route("/stages/{id}", name="openclassdut_stages")
     */
    public function stages($id): Response
    {
        return $this->render('openclassdut/stages.html.twig', [
            'controller_name' => 'OpenclassdutController',
            'idStage' => $id,
        ]);
    }
}
