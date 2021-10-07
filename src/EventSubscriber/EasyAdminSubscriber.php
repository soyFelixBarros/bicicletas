<?php
namespace App\EventSubscriber;

use App\Entity\TypeBicycle;
use App\Entity\Rental;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['beforeEntityPersistedEvent'],
            BeforeEntityUpdatedEvent::class => ['beforeEntityUpdatedEvent'],
        ];
    }

    public function beforeEntityPersistedEvent(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof TypeBicycle) {
            $this->calculateTypePrice($entity);
        }

        if ($entity instanceof Rental) {
            $this->calculateRentalPrice($entity);
            $this->updateBikeAvailability($entity);
        }

        return;
    }

    public function beforeEntityUpdatedEvent(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof TypeBicycle) {
            $this->calculateTypePrice($entity);  
        }

        if ($entity instanceof Rental) {
            $this->calculateRentalPrice($entity);
            $this->updateBikeAvailability($entity);
        }

        return;
    }

    /**
     * Método para actualizar la disponibilidad de bicicletas.
     */
    private function updateBikeAvailability($entity)
    {
        $returned = $entity->getReturned();
        $entity->getBicycle()->setAvailable($returned); 
    }

    /**
     * Método para calcular el precio de los alquiler segun el precio base y los días seleccionados.
     */
    private function calculateRentalPrice($entity)
    {
        $date = $entity->getDate();
        $dateReturn = $entity->getDateReturn();
        $days = (int) $date->diff($dateReturn)->format('%a');
        $price = $entity->getBicycle()->getType()->getPrice();
        
        if ($days > 1) {
            $price = $price * $days; 
        }

        $entity->setPrice($price);
    }

    /**
     * Método para calcular el precio de los alquileres.
     */
    private function calculateTypePrice($entity)
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
