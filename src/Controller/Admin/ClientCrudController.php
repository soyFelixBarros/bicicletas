<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name');
        $rentals = AssociationField::new('rentals');
        $bonusPoints = IntegerField::new('bonusPoints');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$name, $rentals, $bonusPoints];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $rentals, $bonusPoints];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name];
        }
    }
}
