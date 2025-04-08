<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ProjetRepository;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
#[ORM\Table(name: 'projet')]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $Id_projet = null;

    public function getId_Projet(): ?int
    {
        return $this->Id_projet;
    }

    public function setId_projet(int $Id_projet): self
    {
        $this->Id_projet = $Id_projet;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nomProjet = null;

    public function getNomProjet(): ?string
    {
        return $this->nomProjet;
    }

    public function setNomProjet(string $nomProjet): self
    {
        $this->nomProjet = $nomProjet;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Equipe::class, inversedBy: 'projets')]
    #[ORM\JoinColumn(name: 'Id_equipe', referencedColumnName: 'id')]
    private ?Equipe $equipe = null;

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $type = null;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $styleArch = null;

    public function getStyleArch(): ?string
    {
        return $this->styleArch;
    }

    public function setStyleArch(?string $styleArch): self
    {
        $this->styleArch = $styleArch;
        return $this;
    }

    #[ORM\Column(type: 'decimal', nullable: false)]
    private ?float $budget = null;

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(float $budget): self
    {
        $this->budget = $budget;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $etat = null;

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $dateCreation = null;

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'projets')]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'client_id')]
    private ?Client $client = null;

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;
        return $this;
    }



    #[ORM\ManyToOne(targetEntity: Terrain::class, inversedBy: 'projets')]
    #[ORM\JoinColumn(name: 'Id_terrain', referencedColumnName: 'Id_terrain')]
    private ?Terrain $terrain = null;

    public function getTerrain(): ?Terrain
    {
        return $this->terrain;
    }

    public function setTerrain(?Terrain $terrain): self
    {
        $this->terrain = $terrain;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'projets')]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id')]
    private ?Utilisateur $utilisateur = null;

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Contrat::class, mappedBy: 'projet')]
    private Collection $contrats;

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        if (!$this->contrats instanceof Collection) {
            $this->contrats = new ArrayCollection();
        }
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->getContrats()->contains($contrat)) {
            $this->getContrats()->add($contrat);
        }
        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        $this->getContrats()->removeElement($contrat);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Etapeprojet::class, mappedBy: 'projet')]
    private Collection $etapeprojets;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->etapeprojets = new ArrayCollection();
    }

    /**
     * @return Collection<int, Etapeprojet>
     */
    public function getEtapeprojets(): Collection
    {
        if (!$this->etapeprojets instanceof Collection) {
            $this->etapeprojets = new ArrayCollection();
        }
        return $this->etapeprojets;
    }

    public function addEtapeprojet(Etapeprojet $etapeprojet): self
    {
        if (!$this->getEtapeprojets()->contains($etapeprojet)) {
            $this->getEtapeprojets()->add($etapeprojet);
        }
        return $this;
    }

    public function removeEtapeprojet(Etapeprojet $etapeprojet): self
    {
        $this->getEtapeprojets()->removeElement($etapeprojet);
        return $this;
    }

}
