<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $personInCharge;

    /**
     * @ORM\Column(type="integer")
     */
    private $keepAmount;

    //ONE TO MANY
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Connection", mappedBy="project")
     */
    private $Connections;

    public function __construct()
    {
        $this->Connections = new ArrayCollection();
    }

    /**
     * @return Collection|Connection[]
     */
    public function getConnections(): Collection
    {
        return $this->Connections;
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

    public function getPersonInCharge(): ?string
    {
        return $this->personInCharge;
    }

    public function setPersonInCharge(string $personInCharge): self
    {
        $this->personInCharge = $personInCharge;

        return $this;
    }

    public function getKeepAmount(): ?int
    {
        return $this->keepAmount;
    }

    public function setKeepAmount(int $keepAmount): self
    {
        $this->keepAmount = $keepAmount;

        return $this;
    }
}
