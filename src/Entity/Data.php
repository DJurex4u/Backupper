<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataRepository")
 */
class Data
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
}
