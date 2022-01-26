<?php

namespace App\Controller\Admin;

use App\Entity\Empreint;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
class EmpreintCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Empreint::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
 
            TextField::new('username'),
            DateField::new('Date Empreint'),
            DateField::new('Date retour'),
         
            BooleanField::new('Status'
            )->setValue(false)

           
        ];
    }
    
}
