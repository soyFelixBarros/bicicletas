<?php

namespace App\Controller\Admin;

use App\Entity\TypeBicycle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeBicycleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeBicycle::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'name', 'plan']);
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name');
        $plan = AssociationField::new('plan');
        $basePrice = IntegerField::new('basePrice');
        $days = IntegerField::new('days');
        $price = IntegerField::new('price');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $name, $plan, $price];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $plan, $price];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name, $plan, $basePrice, $days];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name, $plan, $basePrice, $days];
        }
    }
}
