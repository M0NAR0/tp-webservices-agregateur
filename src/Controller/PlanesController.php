<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlanesController extends AbstractController
{

    const URL_PLANES_KM = "https://tp-api-rest-service-avion.herokuapp.com/index.php/api";
    const URL_PLANES_MP = "https://trivaphp.herokuapp.com/api";
    const TOKEN_PLANES_MP = "ZPDpXWyKDeavzEDXtMHip89eGN9gSuRzasoDrTc9vKo27YIxJ9";

    /**
     * @Route("/planes", name="planes")
     */
    public function listPlanesEntitiesAction(HttpClientInterface $client)
    {
        $responsePlanesKM = $client->request(
            'GET',
            self::URL_PLANES_KM . "/planes"
        );

        $responsePlanesMP = $client->request(
            'GET',
            self::URL_PLANES_MP . "/planes",
            [
                'headers' => [
                    'Api-Token' => self::TOKEN_PLANES_MP
                ],
            ]
        );

        return $this->render('planes/index.html.twig', [
            'planesKM' => $responsePlanesKM->toArray()["hydra:member"],
            'planesMP' => $responsePlanesMP->toArray(),
        ]);
    }

    /**
     * @Route("/planes/locations", name="planesLocations")
     */
    public function listPlanesLocationsAction(HttpClientInterface $client)
    {
        
        $responseLocationsKM = $client->request(
            'GET',
            self::URL_PLANES_KM . "/locations"
        );
        
        $responseLocationsMP = $client->request(
            'GET',
            self::URL_PLANES_MP . "/cities",
            [
                'headers' => [
                    'Api-Token' => self::TOKEN_PLANES_MP
                ],
            ]
        );

        return $this->render('planes/locations.html.twig', [
            'locationsKM' => $responseLocationsKM->toArray()["hydra:member"],
            'locationsMP' => $responseLocationsMP->toArray(),
        ]);
    }

    /**
     * @Route("/planes/flights", name="planesFlights")
     */
    public function listPlanesFlightsAction(HttpClientInterface $client)
    {
        
        $responseFlightsKM = $client->request(
            'GET',
            self::URL_PLANES_KM . "/flights"
        );
        
        $responseFlightsMP = $client->request(
            'GET',
            self::URL_PLANES_MP . "/flights",
            [
                'headers' => [
                    'Api-Token' => self::TOKEN_PLANES_MP
                ],
            ]
        );

        return $this->render('planes/flights.html.twig', [
            'flightsKM' => $responseFlightsKM->toArray()["hydra:member"],
            'flightsMP' => $responseFlightsMP->toArray(),
        ]);
    }

    /**
     * @Route("/planes/reservations", name="planesReservations")
     */
    public function listPlanesReservationsAction(HttpClientInterface $client)
    {
        
        $responseReservationsKM = $client->request(
            'GET',
            self::URL_PLANES_KM . "/reservations"
        );
        
        $responseReservationsMP = $client->request(
            'GET',
            self::URL_PLANES_MP . "/reservations",
            [
                'headers' => [
                    'Api-Token' => self::TOKEN_PLANES_MP
                ],
            ]
        );

        return $this->render('planes/reservations.html.twig', [
            'reservationsKM' => $responseReservationsKM->toArray()["hydra:member"],
            'reservationsMP' => $responseReservationsMP->toArray(),
        ]);
    }
}
