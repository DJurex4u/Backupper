<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataRepository")
 */
class BData
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
    private $sourceDirectory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destinationDirectory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="bDatas")
     * @ORM\JoinColumn(nullable=false, name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PeriodType", inversedBy="bDatas")
     * @ORM\JoinColumn(nullable=true, name="period_type_id", referencedColumnName="id")
     */
    private $periodType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Connection", mappedBy="bData")
    */
    private $connections;

    public function __construct() {
        $this->connections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSourceDirectory(): ?string
    {
        return $this->sourceDirectory;
    }

    public function setSourceDirectory(string $sourceDirectory): self
    {
        $this->sourceDirectory = $sourceDirectory;

        return $this;
    }

    public function getDestinationDirectory(): ?string
    {
        return $this->destinationDirectory;
    }

    public function setDestinationDirectory(string $destinationDirectory): self
    {
        $this->destinationDirectory = $destinationDirectory;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getPeriodType(): ?PeriodType
    {
        return $this->periodType;
    }

    public function setPeriodType(?PeriodType $periodType): self
    {
        $this->periodType = $periodType;

        return $this;
    }

    /**
     * @return ArrayCollection
    */
    public function  getConnections(): ArrayCollection
    {
        return $this->connections;
    }

    public function addConnection(Connection $connection): self {
        if(!$this->connections->contains($connection)){
            $this->connections[] = $connection;
            $connection->setBData($this);
        }
        return $this;
    }


    public function  removeConnection(Connection $connection): self {

        if ($this->connections->contains($connection)){
            $this->connections->removeElement($connection);
            if($connection->getBData() === $this){
                $connection->setBData(null);
            }
        }
        return $this;
    }
}
