<?php

namespace App\Controller;
use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
    /**
     * @Route("/livre", name="livre.")
     */
class LivreController extends AbstractController
{
    /**
     * @Route("/", name="afficher")
     */
    public function index( LivreRepository $lr): Response
    { $livres=$lr->findAll();
        return $this->render('livre/index.html.twig', [
            'livres' => $livres
        ]);
    }
    /**
     * @Route("/create", name="create")
     */
    public function create (Request $request){
        $livre =new Livre();
        $livre->setTitre("titre");
        $livre->setPrix(120);
        $livre->setIsbn(12);
        $livre->setQteStock(20);
        $em=$this->getDoctrine()->getManager();
        $em->persist($livre);
        $em->flush();
        return new Response("livre crée");

    }
}
