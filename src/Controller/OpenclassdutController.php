<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenclassdutController extends AbstractController
{
    /**
     * @Route("/openclassdut", name="openclassdut")
     */
    public function index(): Response
    {
        return $this->render('openclassdut/index.html.twig', [
            'controller_name' => 'OpenclassdutController',
        ]);
    }
}
