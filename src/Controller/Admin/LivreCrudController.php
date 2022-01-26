<?php

namespace App\Controller\Admin;

use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CurrencyField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LivreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            ImageField::new('image')->setBasePath($this->getParameter("app.path.product_images"))->onlyOnIndex(),            TextField::new('isbn'),
            IntegerField::new('prix'),
            IntegerField::new('qtestock'),
            DateField::new('dateEdition'),

            AssociationField::new('categorie'),
            
            TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
        ];
    }
    
}
