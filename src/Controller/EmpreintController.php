<?php

namespace App\Controller;
use DateInterval;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Livre;
use App\Entity\Empreint;
use App\Repository\EmpreintRepository;
use Symfony\Component\Security\Core\Security;
class EmpreintController extends AbstractController
{
    /**
     * @Route("/empreint", name="empreint")
     */
    public function index( EmpreintRepository $empreintRepo, Request $request)

    {
        $empreints = $empreintRepo->findBy(
            ['username' => $request->getSession()->get(Security::LAST_USERNAME)]
        );

        return $this->render('empreint/index.html.twig', [
            'empreints' => $empreints
        ]);
    }

        /**
     * @Route("/empreinter/{id}", name="empreinter")
     */
    public function enpreinter(Livre $livre, Request $request){
       $user= $request->getSession()->get(Security::LAST_USERNAME);
$datetime =new \DateTime('now');
$dateEmp =new \DateTime('now');
$valeurAjout = 1440; // 2jrs pour l'exemple

       $interval = new \DateInterval('P1W');
       dump($interval);
        $empreint=new Empreint();
        $empreint->setUsername($user);
        $empreint->setIdLivre($livre->getId());
        $empreint->setDateEmpreint($dateEmp);
        $empreint->setDateRetour($datetime->add($interval));
        $empreint->setStatus('en attente');
        $em=$this->getDoctrine()->getManager();
        $em->persist($empreint);
        $em->flush();
        $this->addFlash('empreint', $empreint->getUsername() . ' ' .'votre empreint est faite avec succes');
        return $this->redirect($this->generateUrl('menu'));

    }
       

    }

