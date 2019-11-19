<?php

namespace App\Entity;

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
}
