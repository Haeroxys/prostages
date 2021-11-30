<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenclassdutControllerPhpController extends AbstractController
{
    /**
     * @Route("/openclassdut/controller/php", name="openclassdut_controller_php")
     */
    public function index(): Response
    {
        return $this->render('openclassdut_controller_php/index.html.twig', [
            'controller_name' => 'OpenclassdutControllerPhpController',
        ]);
    }
}
