<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="connections")
     * @ORM\JoinColumn(nullable=false, name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PeriodType", inversedBy="bData")
     * @ORM\JoinColumn(nullable=false)
     */
    private $periodType;

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
}
