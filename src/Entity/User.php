<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $credentials;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="users")
     * @ORM\JoinColumn(nullable=false, name="role_id", referencedColumnName="id")
     */
    private $role;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param mixed $credentials
     */
    public function setCredentials($credentials): void
    {
        $this->credentials = $credentials;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }
    public function getRoleAsString(): string
    {
        return $this->getRole()->getName();
    }

    public function getRoles(): array
    {
        return array($this->getRoleAsString());
    }

    public function setRole(?Role $role): ?self
    {
        $this->role = $role;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getSalt() //had to implement cause of UserInterface
    {
        return null;
    }

    public function getUsername() //had to implement cause of UserInterface
    {
        return $this->email;
    }
    public function setUsername(string $username) //had to implement getUsername cause of UserInterface
    {
        $this->setEmail($username);
    }

    public function eraseCredentials()
    {
     $this->setCredentials('');
    }

}
