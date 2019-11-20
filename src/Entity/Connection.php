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
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="connection")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Data")
     * @ORM\JoinColumn(nullable=false)
     */
    private $data;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Database")
     * @ORM\JoinColumn(nullable=false)
     */
    private $databaseFk;

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

    public function setPort(integer $port): self
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

    public function getData(): ?Data
    {
        return $this->data;
    }

    public function setData(?Data $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getDatabaseFk(): ?Database
    {
        return $this->databaseFk;
    }

    public function setDatabaseFk(?Database $databaseFk): self
    {
        $this->databaseFk = $databaseFk;

        return $this;
    }
}
