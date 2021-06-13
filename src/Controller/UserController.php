<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(Request $request, EntityManagerInterface $manager, UserRepository $repos, UserPasswordEncoderInterface $encod): Response

    {
        $afu = $repos->findAll();
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $hash = $encod->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('user');
        }

        return $this->render('user/index.html.twig', [
            'form'=> $form->createView(),
            'afu'=> $afu
        ]);
    }


    /**
     * @Route("/user/delete{id}", name="user_delete")
     *
     */
    public function delete($id,EntityManagerInterface $manager)
    {

        $empl = $manager->getRepository(User::class)->find($id);
        if ($empl != null ){
            $manager->remove($empl);
            $manager->flush();
        }
        return $this->redirectToRoute('user');
    }

}
