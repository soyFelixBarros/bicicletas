<?php
namespace App\EventSubscriber;

use App\Entity\TypeBicycle;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['persistCalculateRentalPrice'],
            BeforeEntityUpdatedEvent::class => ['updateCalculateRentalPrice'],
        ];
    }

    public function persistCalculateRentalPrice(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof TypeBicycle)) {
            return;
        }
        
        $this->calculateRentalPrice($event, $entity);
    }

    public function updateCalculateRentalPrice(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof TypeBicycle)) {
            return;
        }
        
        $this->calculateRentalPrice($event, $entity);  
    }

    /**
     * Método para calcular el precio de los alquileres.
     */
    private function calculateRentalPrice($event, $entity)
    {
        $basePrice = $entity->getBasePrice();
        $days = $entity->getDays();

        // Si tiene un plan asignado, se tomara el precio del plan para el calculo
        if ($entity->getPlan()) {
            $basePrice = $entity->getPlan()->getPrice();
            $entity->setBasePrice($basePrice);
        }
        $price = $basePrice;

        if ($days > 1) {
            $price = $price * $days; 
        }

        $entity->setPrice($price);
    }
}
