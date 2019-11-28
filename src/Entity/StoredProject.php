<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StoredProject")
 */
class StoredProject
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPersistent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="storedProjects")
     * @ORM\JoinColumn(nullable=false, name="project_id", referencedColumnName="id")
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsPersistent(): ?bool
    {
        return $this->isPersistent;
    }

    public function setIsPersistent(bool $isPersistent): self
    {
        $this->isPersistent = $isPersistent;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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
}
