<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConnectionRepository")
 */
class Connection
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $port;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="connections")
     * @ORM\JoinColumn(nullable=false, name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BData", inversedBy="connections")
     * @ORM\JoinColumn(nullable=true, name="b_data_id", referencedColumnName="id")
     */
    private $bData;

    /**
     * @ORM\ManyToOne(targetEntity="BDatabase", inversedBy="connections")
     * @ORM\JoinColumn(nullable=true, name="b_database_id", referencedColumnName="id")
     */
    private $bDatabase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPort(): ?integer
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

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

    public function getBData(): ?BData
    {
        return $this->bData;
    }

    public function setBData(?BData $bData): self
    {
        $this->bData = $bData;

        return $this;
    }

    public function getBDatabase(): ?BDatabase
    {
        return $this->bDatabase;
    }

    public function setBDatabase(?BDatabase $bDatabase): self
    {
        $this->bDatabase = $bDatabase;

        return $this;
    }
}
