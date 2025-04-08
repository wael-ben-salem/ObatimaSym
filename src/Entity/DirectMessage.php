<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\DirectMessageRepository;

#[ORM\Entity(repositoryClass: DirectMessageRepository::class)]
#[ORM\Table(name: 'direct_messages')]
class DirectMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $message_id = null;

    public function getMessage_id(): ?int
    {
        return $this->message_id;
    }

    public function setMessage_id(int $message_id): self
    {
        $this->message_id = $message_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $sender_id = null;

    public function getSender_id(): ?int
    {
        return $this->sender_id;
    }

    public function setSender_id(int $sender_id): self
    {
        $this->sender_id = $sender_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $receiver_id = null;

    public function getReceiver_id(): ?int
    {
        return $this->receiver_id;
    }

    public function setReceiver_id(int $receiver_id): self
    {
        $this->receiver_id = $receiver_id;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $content = null;

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $sent_at = null;

    public function getSent_at(): ?\DateTimeInterface
    {
        return $this->sent_at;
    }

    public function setSent_at(\DateTimeInterface $sent_at): self
    {
        $this->sent_at = $sent_at;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: false)]
    private ?bool $is_read = null;

    public function is_read(): ?bool
    {
        return $this->is_read;
    }

    public function setIs_read(bool $is_read): self
    {
        $this->is_read = $is_read;
        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function getSenderId(): ?int
    {
        return $this->sender_id;
    }

    public function setSenderId(int $sender_id): static
    {
        $this->sender_id = $sender_id;

        return $this;
    }

    public function getReceiverId(): ?int
    {
        return $this->receiver_id;
    }

    public function setReceiverId(int $receiver_id): static
    {
        $this->receiver_id = $receiver_id;

        return $this;
    }

    public function getSentAt(): ?\DateTimeInterface
    {
        return $this->sent_at;
    }

    public function setSentAt(\DateTimeInterface $sent_at): static
    {
        $this->sent_at = $sent_at;

        return $this;
    }

    public function isRead(): ?bool
    {
        return $this->is_read;
    }

    public function setIsRead(bool $is_read): static
    {
        $this->is_read = $is_read;

        return $this;
    }

}
