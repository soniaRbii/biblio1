<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EditeurRepository;
use App\Repository\AuteurRepository;

use App\Entity\Editeur;
class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/{id}", name="profile")
     */
   
    public function index( EditeurRepository $rep ,Request $request , Editeur $editeur ,AuteurRepository $auteur)
    

    {      
     
        
        
        return $this->render('profile/index.html.twig', [
            'editeur'=>$editeur,
            'auteur'=>$auteur
            
        ]);
    }
}
