<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ConversationMembreRepository;

#[ORM\Entity(repositoryClass: ConversationMembreRepository::class)]
#[ORM\Table(name: 'conversation_membre')]
class ConversationMembre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $conversation_id = null;

    public function getConversation_id(): ?int
    {
        return $this->conversation_id;
    }

    public function setConversation_id(int $conversation_id): self
    {
        $this->conversation_id = $conversation_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $utilisateur_id = null;

    public function getUtilisateur_id(): ?int
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateur_id(int $utilisateur_id): self
    {
        $this->utilisateur_id = $utilisateur_id;
        return $this;
    }

    public function getConversationId(): ?int
    {
        return $this->conversation_id;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(int $utilisateur_id): static
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }

}
