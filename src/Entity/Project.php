<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    //bidirectional CONNECTION
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Connection", mappedBy="project")
     */
    private $connections;



    //bidirectional BDATABASE
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\BDatabase", mappedBy="project")
     */
    private $bDatabases;

    //bidirectional BData
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AApp\Entity\BData", mappedBy="project")
     */
    private $bData;

    /**
     *  @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\StoredProject", mappedBy="project")
     */
    private $storedProjects;




    /**
     * @return Collection|Connection[]
     */
    public function getConnections(): Collection
    {
        return $this->connections;
    }


    public function __construct()
    {
        $this->connections = new ArrayCollection();
        $this->bDatabases = new ArrayCollection();
        $this->storedProjects = new ArrayCollection();
    }





    /**
     * @return Collection|Connection[]
     */
    public function getBDatabases(): Collection
    {
        return $this->bDatabases;
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

    /**
     * @return Collection|StoredProject[]
     */
    public function getStoredProjects(): Collection
    {
        return $this->storedProjects;
    }

    public function addStoredProject(StoredProject $storedProject): self
    {
        if (!$this->storedProjects->contains($storedProject)) {
            $this->storedProjects[] = $storedProject;
            $storedProject->setProject($this);
        }

        return $this;
    }

    public function removeStoredProject(StoredProject $storedProject): self
    {
        if ($this->storedProjects->contains($storedProject)) {
            $this->storedProjects->removeElement($storedProject);
            // set the owning side to null (unless already changed)
            if ($storedProject->getProject() === $this) {
                $storedProject->setProject(null);
            }
        }

        return $this;
    }
}
