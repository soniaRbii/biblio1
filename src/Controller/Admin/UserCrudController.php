<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('username'),
            ChoiceField::new('roles', 'Roles')
                    ->allowMultipleChoices()
                    ->autocomplete()
                    ->setChoices([  'User' => 'ROLE_USER',
                                    'Admin' => 'ROLE_ADMIN',]
        ),
            HiddenField::new('password')

        ];
    }
    
}
