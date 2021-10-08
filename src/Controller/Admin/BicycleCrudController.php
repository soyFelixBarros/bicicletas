<?php

namespace App\Controller\Admin;

use App\Entity\Bicycle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BicycleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bicycle::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'name']);
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name');
        $type = AssociationField::new('type');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $name, $type];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $type];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name, $type];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name, $type];
        }
    }
}
