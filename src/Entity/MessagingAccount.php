<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\MessagingAccountRepository;

#[ORM\Entity(repositoryClass: MessagingAccountRepository::class)]
#[ORM\Table(name: 'messaging_accounts')]
class MessagingAccount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $user_id = null;

    public function getUser_id(): ?int
    {
        return $this->user_id;
    }

    public function setUser_id(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $role_specific_id = null;

    public function getRole_specific_id(): ?int
    {
        return $this->role_specific_id;
    }

    public function setRole_specific_id(?int $role_specific_id): self
    {
        $this->role_specific_id = $role_specific_id;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    public function getCreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $username = null;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getRoleSpecificId(): ?int
    {
        return $this->role_specific_id;
    }

    public function setRoleSpecificId(?int $role_specific_id): static
    {
        $this->role_specific_id = $role_specific_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

}
