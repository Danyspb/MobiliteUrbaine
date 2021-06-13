<?php

namespace App\Controller;

use App\Entity\Itineraire;
use App\Form\ItineraireType;
use App\Repository\BusRepository;
use App\Repository\ItineraireRepository;
use App\Repository\LigneBusRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItineraireController extends AbstractController
{
    /**
     * @Route("/itineraire", name="itineraire")
     */
    public function index( EntityManagerInterface $manager, Request $request, UserRepository $user, LigneBusRepository $ligne, ItineraireRepository $iti, BusRepository $bus): Response
    {

        $users = $user->findAll();
        $lignes = $ligne->findAll();
        $rine = new Itineraire();
        $form = $this->createForm(ItineraireType::class, $rine);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $manager->persist($rine);
            $manager->flush();

            return $this->redirectToRoute("itineraire");
        }

        return $this->render('itineraire/index.html.twig', [
            'form'=> $form->createView(),
            'users'=> $users,
            'lignes' => $lignes,
            'bu' => $bus
        ]);
    }

    /**
     * @Route("/moditine", name="moditine")
     */
    public function itine (Request $request, EntityManagerInterface $manager, LigneBusRepository $bus, UserRepository $user, ItineraireRepository $iti): Response
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
        return $this->render('itineraire/moditine.html.twig', [
            'form' =>$form->createView(),
            'bus' =>$bu,
            'itinis' =>$itini,
            'users' => $users
        ]);
    }


    /**
     * @Route("/iti/delete{id}", name="iti_delete")
     *
     */
    public function delete($id,EntityManagerInterface $manager)
    {

        $iti = $manager->getRepository(Itineraire::class)->find($id);
        if ($iti != null ){
            $manager->remove($iti);
            $manager->flush();
        }
        return $this->redirectToRoute('moditine');
    }

}
