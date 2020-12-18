<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CarsController extends AbstractController
{
    /**
     * @Route("/cars", name="cars")
     */
    public function index(HttpClientInterface $httpCars): Response
    {
        $response = $httpCars->request('GET', 'https://mysterious-eyrie-25660.herokuapp.com/cars', [
            'headers' => [
                'Authorization' => 'Bearer ' . 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjA4Mjg3MzE1LCJleHAiOjE2MDgzNzM3MTV9.n440z2eNDH80TLRWMqc0oo2V7YKUAG_ZOFbQrgQIk8w',
                'Accept' => 'application/json',
            ],
        ]);

        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController',
            'repos' => $response->toArray(),
        ]);
    }
}