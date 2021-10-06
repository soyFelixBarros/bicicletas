<?php

namespace App\Controller\Admin;

use App\Entity\Bicycle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BicycleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bicycle::class;
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
