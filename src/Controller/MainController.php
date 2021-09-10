<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Entity\Identite;
use App\Entity\SiteDeveloppe;
use App\Entity\Client;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(EntityManagerInterface $em, Request $request): Response
    {
        $client = new Client();

        $identiteRepo = $this->getDoctrine()->getRepository(Identite::class);
        $identite=$identiteRepo->find(1);

        $competenceRepo = $this->getDoctrine()->getRepository(Competence::class);
        $competenceBack = $competenceRepo->findBy(array('fonction'=>'backend'));
        $competenceFront = $competenceRepo->findBy(array('fonction'=>'frontend'));
        $competenceAll = $competenceRepo->findAll();

        $siteDeveloppeRepo = $this->getDoctrine()->getRepository(SiteDeveloppe::class);
        $siteDeveloppes = $siteDeveloppeRepo->findAll();

        $clientForm = $this->createForm(ContactType::class,$client);
        $clientForm->handleRequest($request);

        if ($clientForm->isSubmitted() && $clientForm->isValid())
        {
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
            'monIdentite'=>$identite,
            'backend'=>$competenceBack,
            'frontend'=>$competenceFront,
            'all'=>$competenceAll,
            'siteDeveloppes'=>$siteDeveloppes,
            'formulaireContact'=>$clientForm->createView()
        ]);
    }


    /**
     * @Route ("/Mentions_legales", name="mentionsLegales")
     */
    public function mentionLegales()
    {
        return $this->render('politiqueConfidentialite/mentionsLegales.html.twig');
    }


    /**
     * @Route ("/Politique_de_confidentialite", name="politique")
     */
    public function politique()
    {
        return $this->render('politiqueConfidentialite/politiqueDeConfidentialite.html.twig');
    }
}
