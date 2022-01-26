<?php

namespace App\Controller\Admin;
use  App\Entity\Categorie;
use  App\Entity\Auteur;
use  App\Entity\Editeur;
use  App\Entity\Livre;
use  App\Entity\Empreint;
use  App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Biblio');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
         yield MenuItem::linkToCrud('Auteur', 'fas fa-list', Auteur::class);
         yield MenuItem::linkToCrud('Editeur', 'fas fa-list', Editeur::class);
         yield MenuItem::linkToCrud('Livre', 'fas fa-list', Livre::class);
         yield MenuItem::linkToCrud('Empreint', 'fas fa-list', Empreint::class);
         yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);
    }
}
