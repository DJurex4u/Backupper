<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PeriodTypeRepository")
 */
class PeriodType
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
    private $frequency;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDateTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endDateTime;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BDatabase", mappedBy="periodType")
     */
    private $bDatabases;

    public function __construct()
    {
        $this->bDatabases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeInterface
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?\DateTimeInterface
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    /**
     * @return Collection|BDatabase[]
     */
    public function getBDatabases(): Collection
    {
        return $this->bDatabases;
    }

    public function addBDatabase(BDatabase $bDatabase): self
    {
        if (!$this->bDatabases->contains($bDatabase)) {
            $this->bDatabases[] = $bDatabase;
            $bDatabase->setPeriodType($this);
        }

        return $this;
    }

    public function removeBDatabase(BDatabase $bDatabase): self
    {
        if ($this->bDatabases->contains($bDatabase)) {
            $this->bDatabases->removeElement($bDatabase);
            // set the owning side to null (unless already changed)
            if ($bDatabase->getPeriodType() === $this) {
                $bDatabase->setPeriodType(null);
            }
        }

        return $this;
    }
}
