<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BusController extends AbstractController
{
    /**
     * @Route("/bus", name="bus")
     */
    public function index(): Response
    {
        return $this->render('bus/index.html.twig', [
            'controller_name' => 'BusController',
        ]);
    }



    /**
     * @Route ("/bus7op", name="7OP")
     */
    public function bus(): Response
    {
        return $this->render('ligne_bus/ligne7op.html.twig',[

        ]);
    }
}
