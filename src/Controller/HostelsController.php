<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HostelsController extends AbstractController
{
    /**
     * @Route("/hostels", name="hostels")
     */
    public function index(): Response
    {
        return $this->render('hostels/index.html.twig', [
            'controller_name' => 'HostelsController',
        ]);
    }
}
