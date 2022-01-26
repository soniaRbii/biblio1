<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Data\SearchData;
use App\Form\SearchForm;

use App\Repository\LivreRepository;
class SearchController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index(LivreRepository $repository, Request $request)
    {
        $data = new SearchData();
        
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $livres= $repository->findAll();
        $livres=$repository->findSearch($data);
       
       
       
       
        return $this->render('menu/index.html.twig', [
            'livres' =>$livres,
           
            'form' => $form->createView()
        ]);
    }
    
}
