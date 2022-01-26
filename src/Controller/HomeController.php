<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use App\Repository\EditeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\AuteurRepository;
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(LivreRepository $gr , EditeurRepository   $editeur,AuteurRepository $auteur)
    {
        $livres = $gr->findAll();
        $zufall = array_rand($livres, 2);
       
    $editeur=$editeur->findById($livres[$zufall[0]]->getEditeur()->getId());
    $auteur=$livres[$zufall[0]]->getAuteurs();
    dump($auteur);
   foreach ($editeur as $ed) {
        $id=$ed->getId();
}
foreach ($auteur as $aut) {
    $idaut=$aut->getId();
    dump($idaut);
}


  
   
        return $this->render('home/index.html.twig', [
            'livre1' => $livres[$zufall[0]],
            'livre2' => $livres[$zufall[1]],
            'editeur'=>$editeur,
            'auteur'=>$auteur,
            'id'=>$id,
           
           
            
          
            
           
            
            
           
        ]);
    }
    public function findSearch(){
      
    }
  
    
}
