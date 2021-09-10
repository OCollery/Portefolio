<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Entity\Identite;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        return $this->render('admin/accueilAdmin.html.twig', [
        ]);
    }









    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/login.html.twig',[
            'last_username'=>$lastUsername,
            'error'=>$error,
        ]);
    }

    /**
     * @Route ("/logout",name="logout")
     */
    public function logout(){}


    /**
     * @Route ("/creer_compte",name="createUser")
     */
    public function createUser(EntityManagerInterface $em,Request $request,UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        $user->setAdmin(false);


        if ($form->isSubmitted() && $form->isValid())
        {
            $hashed = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('admin/createUser.html.twig',[
            'createForm'=>$form->createView()
        ]);
    }
}
