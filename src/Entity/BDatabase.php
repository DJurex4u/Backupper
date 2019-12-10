<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DatabaseRepository")
 */
class BDatabase
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
    private $serverName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $driver;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $port;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dbSchema;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="bDatabases")
     * @ORM\JoinColumn(nullable=false, name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PeriodType", inversedBy="bDatabases")
     * @ORM\JoinColumn(nullable=true, name="period_type_id", referencedColumnName="id")
     */
    private $periodType;

    /**
     *
     * @ORM\OneToMany(targetEntity="Connection", mappedBy="bDatabase")
     */
    private $connections;


    public function __construct() {
        $this->connections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServerName(): ?string
    {
        return $this->serverName;
    }

    public function setServerName(string $serverName): self
    {
        $this->serverName = $serverName;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

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

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function setPort(string $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getDbSchema(): ?string
    {
        return $this->dbSchema;
    }

    public function setDbSchema(string $dbSchema): self
    {
        $this->dbSchema = $dbSchema;

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

    public function getPeriodType(): self
    {
        return $this;
    }

    public function setPeriodType(?PeriodType $periodType): self
    {
        $this->periodType = $periodType;

        return $this;
    }

    public function getConnection(): self
    {

        return $this;
    }

    public function setConnection(?Connection $connections): self
    {
        $this->connections = $connections;

        return $this;
    }
}
