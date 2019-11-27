<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 * @method string[] getReachableRoleNames(string[] $roles)
 */
class Role implements RoleHierarchyInterface
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
    private $name;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="role")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getUsers(): ArrayCollection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setRole($this);
        }

        return $this;
    }


    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getProject() === $this) {
                $user->setProject(null);
            }
        }

        return $this;
    }


    public function __call($name, $arguments)
    {
        // TODO: Implement @method string[] getReachableRoleNames(string[] $roles)
    }


}
