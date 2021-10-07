<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PlanTypeBicycleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PlanTypeBicycleRepository::class)
 */
class PlanTypeBicycle
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=TypeBicycle::class, mappedBy="plan")
     */
    private $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|TypeBicycle[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(TypeBicycle $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
            $type->setPlan($this);
        }

        return $this;
    }

    public function removeType(TypeBicycle $type): self
    {
        if ($this->types->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getPlan() === $this) {
                $type->setPlan(null);
            }
        }

        return $this;
    }
}
