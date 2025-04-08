<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\UtilisateurRepository;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'utilisateur')]
class Utilisateur
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nom = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $prenom = null;

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $email = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $telephone = null;

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $role = null;

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $adresse = null;

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $mot_de_passe = null;

    public function getMot_de_passe(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMot_de_passe(string $mot_de_passe): self
    {
        $this->mot_de_passe = $mot_de_passe;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $statut = null;

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $isConfirmed = null;

    public function isIsConfirmed(): ?bool
    {
        return $this->isConfirmed;
    }

    public function setIsConfirmed(?bool $isConfirmed): self
    {
        $this->isConfirmed = $isConfirmed;
        return $this;
    }

    #[ORM\Column(type: 'blob', nullable: true)]
    private ?string $face_data = null;

    public function getFace_data(): ?string
    {
        return $this->face_data;
    }

    public function setFace_data(?string $face_data): self
    {
        $this->face_data = $face_data;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Admin::class, mappedBy: 'utilisateur')]
    private Collection $admins;

    /**
     * @return Collection<int, Admin>
     */
    public function getAdmins(): Collection
    {
        if (!$this->admins instanceof Collection) {
            $this->admins = new ArrayCollection();
        }
        return $this->admins;
    }

    public function addAdmin(Admin $admin): self
    {
        if (!$this->getAdmins()->contains($admin)) {
            $this->getAdmins()->add($admin);
        }
        return $this;
    }

    public function removeAdmin(Admin $admin): self
    {
        $this->getAdmins()->removeElement($admin);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Artisan::class, mappedBy: 'utilisateur')]
    private Collection $artisans;

    /**
     * @return Collection<int, Artisan>
     */
    public function getArtisans(): Collection
    {
        if (!$this->artisans instanceof Collection) {
            $this->artisans = new ArrayCollection();
        }
        return $this->artisans;
    }

    public function addArtisan(Artisan $artisan): self
    {
        if (!$this->getArtisans()->contains($artisan)) {
            $this->getArtisans()->add($artisan);
        }
        return $this;
    }

    public function removeArtisan(Artisan $artisan): self
    {
        $this->getArtisans()->removeElement($artisan);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'utilisateur')]
    private Collection $clients;

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        if (!$this->clients instanceof Collection) {
            $this->clients = new ArrayCollection();
        }
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->getClients()->contains($client)) {
            $this->getClients()->add($client);
        }
        return $this;
    }

    public function removeClient(Client $client): self
    {
        $this->getClients()->removeElement($client);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Constructeur::class, mappedBy: 'utilisateur')]
    private Collection $constructeurs;

    /**
     * @return Collection<int, Constructeur>
     */
    public function getConstructeurs(): Collection
    {
        if (!$this->constructeurs instanceof Collection) {
            $this->constructeurs = new ArrayCollection();
        }
        return $this->constructeurs;
    }

    public function addConstructeur(Constructeur $constructeur): self
    {
        if (!$this->getConstructeurs()->contains($constructeur)) {
            $this->getConstructeurs()->add($constructeur);
        }
        return $this;
    }

    public function removeConstructeur(Constructeur $constructeur): self
    {
        $this->getConstructeurs()->removeElement($constructeur);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Gestionnairestock::class, mappedBy: 'utilisateur')]
    private Collection $gestionnairestocks;

    /**
     * @return Collection<int, Gestionnairestock>
     */
    public function getGestionnairestocks(): Collection
    {
        if (!$this->gestionnairestocks instanceof Collection) {
            $this->gestionnairestocks = new ArrayCollection();
        }
        return $this->gestionnairestocks;
    }

    public function addGestionnairestock(Gestionnairestock $gestionnairestock): self
    {
        if (!$this->getGestionnairestocks()->contains($gestionnairestock)) {
            $this->getGestionnairestocks()->add($gestionnairestock);
        }
        return $this;
    }

    public function removeGestionnairestock(Gestionnairestock $gestionnairestock): self
    {
        $this->getGestionnairestocks()->removeElement($gestionnairestock);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Projet::class, mappedBy: 'utilisateur')]
    private Collection $projets;

    public function __construct()
    {
        $this->admins = new ArrayCollection();
        $this->artisans = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->constructeurs = new ArrayCollection();
        $this->gestionnairestocks = new ArrayCollection();
        $this->projets = new ArrayCollection();
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        if (!$this->projets instanceof Collection) {
            $this->projets = new ArrayCollection();
        }
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->getProjets()->contains($projet)) {
            $this->getProjets()->add($projet);
        }
        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        $this->getProjets()->removeElement($projet);
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function isConfirmed(): ?bool
    {
        return $this->isConfirmed;
    }

    public function getFaceData()
    {
        return $this->face_data;
    }

    public function setFaceData($face_data): static
    {
        $this->face_data = $face_data;

        return $this;
    }

}
