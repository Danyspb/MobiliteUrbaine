<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="acceuil")
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }
}
