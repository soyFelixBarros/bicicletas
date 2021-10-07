<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RentalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RentalRepository::class)
 */
class Rental
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="rentals")
     */
    private $client;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateReturn;

    /**
     * @ORM\ManyToOne(targetEntity=Bicycle::class, inversedBy="rentals")
     */
    private $bicycle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default": 0})
     */
    private $returned;

    public function __toString()
    {
        return $this->getPrice();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateReturn(): ?\DateTimeInterface
    {
        return $this->dateReturn;
    }

    public function setDateReturn(?\DateTimeInterface $dateReturn): self
    {
        $this->dateReturn = $dateReturn;

        return $this;
    }

    public function getBicycle(): ?Bicycle
    {
        return $this->bicycle;
    }

    public function setBicycle(?Bicycle $bicycle): self
    {
        $this->bicycle = $bicycle;

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

    public function getReturned(): ?bool
    {
        return $this->returned;
    }

    public function setReturned(bool $returned): self
    {
        $this->returned = $returned;

        return $this;
    }
}
