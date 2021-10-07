<?php

namespace App\Controller\Admin;

use App\Entity\Bicycle;
use App\Entity\TypeBicycle;
use App\Entity\PlanTypeBicycle;
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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Application');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        
        yield MenuItem::section('Bicycles', 'fas fa-folder-open');
        yield MenuItem::linkToCrud('List', 'fas fa-bicycle', Bicycle::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Types', 'far fa-list-alt', TypeBicycle::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Plans', 'fas fa-money-check-alt', PlanTypeBicycle::class)->setDefaultSort(['id' => 'DESC']);
    }
}
