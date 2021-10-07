<?php

namespace App\Controller\Admin;

use App\Entity\Rental;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RentalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rental::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
