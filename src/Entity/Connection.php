<?php

namespace App\Entity;

use App\Entity\Interfaces\IEncryptable;
use App\Service\Encryptor;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConnectionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Connection implements IEncryptable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $password;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Assert\NotNull()
     */
    private $port;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dbHostName;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="connections")
     * @ORM\JoinColumn(nullable=false, name="project_id", referencedColumnName="id")
     * @Assert\NotNull()
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iv;


    /**
     * @var Encryptor $encryptor
     */
    private $encryptor;

    /**
     * Connection constructor.
     * @param Encryptor $encryptor
     */
    public function __construct()
    {

    }





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



    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDbHostName()
    {
        return $this->dbHostName;
    }

    /**
     * @param mixed $dbHostName
     */
    public function setDbHostName($dbHostName): void
    {
        $this->dbHostName = $dbHostName;
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


    /**
     * @ORM\PostLoad()
     * @ORM\PrePersist()
     */
    public function kita() {
    }








    public function getIv(): ?string
    {
        return $this->iv;
    }

    public function setIv(): IEncryptable
    {
        $this->iv = $this->encryptor->generateIV();
        return $this;
    }

    public function getPassword(): ?string
    {
        return "******  test u Connection::getPassword";
        $decryptpassword = $this->encryptor->decrypt($this->password, $this);
        return $decryptpassword;
    }

    /**
     * @param string $password
     * @return Connection
     */
    public function setPassword(string $password): IEncryptable
    {
        $this->password = $this->encryptor->encrypt($password, $this);
        return $this;
    }

}
