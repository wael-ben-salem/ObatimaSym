<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\MessageRepository;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[ORM\Table(name: 'message')]
class Message
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

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $conversation_id = null;

    public function getConversation_id(): ?int
    {
        return $this->conversation_id;
    }

    public function setConversation_id(?int $conversation_id): self
    {
        $this->conversation_id = $conversation_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $expediteur_id = null;

    public function getExpediteur_id(): ?int
    {
        return $this->expediteur_id;
    }

    public function setExpediteur_id(?int $expediteur_id): self
    {
        $this->expediteur_id = $expediteur_id;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $contenu = null;

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_envoi = null;

    public function getDate_envoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDate_envoi(?\DateTimeInterface $date_envoi): self
    {
        $this->date_envoi = $date_envoi;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $lu = null;

    public function isLu(): ?bool
    {
        return $this->lu;
    }

    public function setLu(?bool $lu): self
    {
        $this->lu = $lu;
        return $this;
    }

    public function getConversationId(): ?int
    {
        return $this->conversation_id;
    }

    public function setConversationId(?int $conversation_id): static
    {
        $this->conversation_id = $conversation_id;

        return $this;
    }

    public function getExpediteurId(): ?int
    {
        return $this->expediteur_id;
    }

    public function setExpediteurId(?int $expediteur_id): static
    {
        $this->expediteur_id = $expediteur_id;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDateEnvoi(?\DateTimeInterface $date_envoi): static
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }

}
