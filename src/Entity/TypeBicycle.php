<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeBicycleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeBicycleRepository::class)
 */
class TypeBicycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Bicycle::class, mappedBy="type")
     */
    private $bicycles;

    /**
     * @ORM\ManyToOne(targetEntity=PlanTypeBicycle::class, inversedBy="types")
     */
    private $plan;

    public function __construct()
    {
        $this->bicycles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Bicycle[]
     */
    public function getBicycles(): Collection
    {
        return $this->bicycles;
    }

    public function addBicycle(Bicycle $bicycle): self
    {
        if (!$this->bicycles->contains($bicycle)) {
            $this->bicycles[] = $bicycle;
            $bicycle->setType($this);
        }

        return $this;
    }

    public function removeBicycle(Bicycle $bicycle): self
    {
        if ($this->bicycles->removeElement($bicycle)) {
            // set the owning side to null (unless already changed)
            if ($bicycle->getType() === $this) {
                $bicycle->setType(null);
            }
        }

        return $this;
    }

    public function getPlan(): ?PlanTypeBicycle
    {
        return $this->plan;
    }

    public function setPlan(?PlanTypeBicycle $plan): self
    {
        $this->plan = $plan;

        return $this;
    }
}
