<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 */
#[ORM\Table(name: 'utilisateur')]
#[ORM\Index(name: 'idx_role', columns: ['role'])]
#[ORM\UniqueConstraint(name: 'email', columns: ['email'])]
#[ORM\Entity]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'nom', type: 'string', length: 50, nullable: false)]
    private $nom;

    /**
     * @var string
     */
    #[ORM\Column(name: 'prenom', type: 'string', length: 50, nullable: false)]
    private $prenom;

    /**
     * @var string
     */
    #[ORM\Column(name: 'email', type: 'string', length: 100, nullable: false)]
    private $email;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'telephone', type: 'string', length: 20, nullable: true)]
    private $telephone;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'role', type: 'string', length: 0, nullable: true, options: ['default' => 'Client'])]
    private $role = 'Client';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adresse', type: 'text', length: 65535, nullable: true)]
    private $adresse;

    /**
     * @var string
     */
    #[ORM\Column(name: 'mot_de_passe', type: 'string', length: 255, nullable: false)]
    private $password;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'statut', type: 'string', length: 0, nullable: true, options: ['default' => 'en_attente'])]
    private $statut = 'en_attente';

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'isConfirmed', type: 'boolean', nullable: true)]
    private $isconfirmed = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'face_data', type: 'blob', length: 0, nullable: true)]
    private $faceData;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'reset_token', type: 'string', length: 255, nullable: true)]
    private $resetToken;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'reset_token_expiry', type: 'datetime', nullable: true)]
    private $resetTokenExpiry;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: \Conversation::class, mappedBy: 'utilisateur')]
    private $conversation = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conversation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->password;
    }

    public function setMotDePasse(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function isconfirmed(): ?bool
    {
        return $this->isconfirmed;
    }

    public function setIsconfirmed(?bool $isconfirmed): static
    {
        $this->isconfirmed = $isconfirmed;

        return $this;
    }

    public function getFaceData()
    {
        return $this->faceData;
    }

    public function setFaceData($faceData): static
    {
        $this->faceData = $faceData;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): static
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    public function getResetTokenExpiry(): ?\DateTimeInterface
    {
        return $this->resetTokenExpiry;
    }

    public function setResetTokenExpiry(?\DateTimeInterface $resetTokenExpiry): static
    {
        $this->resetTokenExpiry = $resetTokenExpiry;

        return $this;
    }

    /**
     * @return Collection<int, Conversation>
     */
    public function getConversation(): Collection
    {
        return $this->conversation;
    }

    public function addConversation(Conversation $conversation): static
    {
        if (!$this->conversation->contains($conversation)) {
            $this->conversation->add($conversation);
            $conversation->addUtilisateur($this);
        }

        return $this;
    }

    public function removeConversation(Conversation $conversation): static
    {
        if ($this->conversation->removeElement($conversation)) {
            $conversation->removeUtilisateur($this);
        }

        return $this;
    }
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return ['ROLE_' . strtoupper($this->role ?? 'CLIENT')];
    }
    

    public function eraseCredentials(): void
    {
        // Si tu stockes des données sensibles temporairement, efface-les ici
    }

}
