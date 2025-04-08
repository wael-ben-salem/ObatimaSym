<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\EquipeRepository;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
#[ORM\Table(name: 'equipe')]
class Equipe
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

    #[ORM\OneToOne(targetEntity: Constructeur::class, inversedBy: 'equipe')]
    #[ORM\JoinColumn(name: 'constructeur_id', referencedColumnName: 'constructeur_id', unique: true)]
    private ?Constructeur $constructeur = null;

    public function getConstructeur(): ?Constructeur
    {
        return $this->constructeur;
    }

    public function setConstructeur(?Constructeur $constructeur): self
    {
        $this->constructeur = $constructeur;
        return $this;
    }

    #[ORM\OneToOne(targetEntity: Gestionnairestock::class, inversedBy: 'equipe')]
    #[ORM\JoinColumn(name: 'gestionnaire_stock_id', referencedColumnName: 'gestionnairestock_id', unique: true)]
    private ?Gestionnairestock $gestionnairestock = null;

    public function getGestionnairestock(): ?Gestionnairestock
    {
        return $this->gestionnairestock;
    }

    public function setGestionnairestock(?Gestionnairestock $gestionnairestock): self
    {
        $this->gestionnairestock = $gestionnairestock;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $date_creation = null;

    public function getDate_creation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDate_creation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Projet::class, mappedBy: 'equipe')]
    private Collection $projets;

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

    #[ORM\ManyToMany(targetEntity: Artisan::class, inversedBy: 'equipes')]
    #[ORM\JoinTable(
        name: 'equipe_artisan',
        joinColumns: [
            new ORM\JoinColumn(name: 'equipe_id', referencedColumnName: 'id')
        ],
        inverseJoinColumns: [
            new ORM\JoinColumn(name: 'artisan_id', referencedColumnName: 'artisan_id')
        ]
    )]
    private Collection $artisans;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
        $this->artisans = new ArrayCollection();
    }

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }
}
