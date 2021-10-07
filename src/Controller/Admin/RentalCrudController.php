<?php

namespace App\Controller\Admin;

use App\Entity\Rental;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RentalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rental::class;
    }

    public function configureActions(Actions $actions): actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL) 
        // ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
        // ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
        ;

    }   

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'client']);
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $client = AssociationField::new('client');
        $date = DateField::new('date');
        $dateReturn = DateField::new('dateReturn');
        $bicycle = AssociationField::new('bicycle');
        $price = IntegerField::new('price');
        $returned = BooleanField::new('returned');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$client, $date, $dateReturn, $bicycle, $price, $returned];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $client, $date, $dateReturn, $bicycle, $price, $returned];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$client, $date, $dateReturn, $bicycle];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$client, $date, $dateReturn, $bicycle, $returned];
        }
    }
}
