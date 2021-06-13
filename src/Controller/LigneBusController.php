<?php

namespace App\Controller;

use App\Entity\LigneBus;
use App\Form\LigneBusType;
use App\Repository\ItineraireRepository;
use App\Repository\LigneBusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LigneBusController extends AbstractController
{
    /**
     * @Route("/ligne/bus", name="ligne_bus")
     */
    public function index( Request $request, EntityManagerInterface $manager, ItineraireRepository $repo): Response
    {
        $li = $repo->findAll();
        $ligne = new LigneBus();
        $form = $this->createForm(LigneBusType::class,$ligne);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($ligne);
            $manager->flush();
        }

        return $this->render('ligne_bus/index.html.twig', [
            'form' =>$form->createView(),
            'li'=> $li
        ]);
    }
}
