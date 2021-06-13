<?php

namespace App\Controller;

use App\Entity\Itineraire;
use App\Form\ItineraireType;
use App\Repository\ItineraireRepository;
use App\Repository\LigneBusRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeItineraireController extends AbstractController
{
    /**
     * @Route("/liste/itineraire", name="liste_itineraire")
     */
    public function index(Request $request, EntityManagerInterface $manager, LigneBusRepository $bus, UserRepository $user, ItineraireRepository $iti): Response
    {

        $itini = $iti->findAll();
        $bu = $bus->findAll();
        $users = $user->findAll();
        $irini = new Itineraire();
        $form = $this->createForm(ItineraireType::class, $irini);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($irini);
            $manager->flush();
        }
        return $this->render('liste_itineraire/index.html.twig', [
            'form' =>$form->createView(),
            'bus' =>$bu,
            'itinis' =>$itini,
            'users' => $users
        ]);
    }
}
