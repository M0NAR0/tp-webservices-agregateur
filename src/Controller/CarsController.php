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
        $responseBS = $httpCars->request('GET', 'https://mysterious-eyrie-25660.herokuapp.com/cars', [
            'headers' => [
                'Authorization' => 'Bearer ' . 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjA4Mjg3MzE1LCJleHAiOjE2MDgzNzM3MTV9.n440z2eNDH80TLRWMqc0oo2V7YKUAG_ZOFbQrgQIk8w',
                'Accept' => 'application/json',
            ],
        ]);

        $responseJY = $httpCars->request('GET', 'https://webservicecar.herokuapp.com/cars/all', [
            'headers' => [                
                'Accept' => 'application/json',
            ],
        ]);     


        return $this->render('cars/index.html.twig', [
            'reposBS' => $responseBS->toArray(),
            'reposJY' => $responseJY->toArray()["_embedded"]["carList"],
        ]);
    }

    /**
     * @Route("/cars/reservations", name="carsReservations")
     */
    public function reservationCar(HttpClientInterface $httpResaCars): Response
    {
        $responseBS = $httpResaCars->request('GET', 'https://mysterious-eyrie-25660.herokuapp.com/reservations', [
            'headers' => [
                'Authorization' => 'Bearer ' . 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjA4Mjg3MzE1LCJleHAiOjE2MDgzNzM3MTV9.n440z2eNDH80TLRWMqc0oo2V7YKUAG_ZOFbQrgQIk8w',
                'Accept' => 'application/json',
            ],
        ]);

        $responseJY = $httpResaCars->request('GET', 'https://webservicecar.herokuapp.com/rentals/all', [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]); 
        
        return $this->render('cars/reservations.html.twig', [
            'reposBS' => $responseBS->toArray(),
            'reposJY' => $responseJY->toArray()["_embedded"]["rentalList"],
        ]);
    }
}
