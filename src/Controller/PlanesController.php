<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanesController extends AbstractController
{
    /**
     * @Route("/planes", name="planes")
     */
    public function index(): Response
    {
        return $this->render('planes/index.html.twig', [
            'controller_name' => 'PlanesController',
        ]);
    }
}
