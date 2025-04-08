<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\VoteRepository;

#[ORM\Entity(repositoryClass: VoteRepository::class)]
#[ORM\Table(name: 'votes')]
class Vote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
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

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $equipe_id = null;

    public function getEquipe_id(): ?int
    {
        return $this->equipe_id;
    }

    public function setEquipe_id(int $equipe_id): self
    {
        $this->equipe_id = $equipe_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $rating = null;

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $voted_at = null;

    public function getVoted_at(): ?\DateTimeInterface
    {
        return $this->voted_at;
    }

    public function setVoted_at(\DateTimeInterface $voted_at): self
    {
        $this->voted_at = $voted_at;
        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getEquipeId(): ?int
    {
        return $this->equipe_id;
    }

    public function setEquipeId(int $equipe_id): static
    {
        $this->equipe_id = $equipe_id;

        return $this;
    }

    public function getVotedAt(): ?\DateTimeInterface
    {
        return $this->voted_at;
    }

    public function setVotedAt(\DateTimeInterface $voted_at): static
    {
        $this->voted_at = $voted_at;

        return $this;
    }

}
