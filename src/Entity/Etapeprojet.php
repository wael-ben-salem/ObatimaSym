<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\EtapeprojetRepository;

#[ORM\Entity(repositoryClass: EtapeprojetRepository::class)]
#[ORM\Table(name: 'etapeprojet')]
class Etapeprojet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $Id_etapeProjet = null;

    public function getId_etapeProjet(): ?int
    {
        return $this->Id_etapeProjet;
    }

    public function setId_etapeProjet(int $Id_etapeProjet): self
    {
        $this->Id_etapeProjet = $Id_etapeProjet;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Projet::class, inversedBy: 'etapeprojets')]
    #[ORM\JoinColumn(name: 'Id_projet', referencedColumnName: 'Id_projet')]
    private ?Projet $projet = null;

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nomEtape = null;

    public function getNomEtape(): ?string
    {
        return $this->nomEtape;
    }

    public function setNomEtape(string $nomEtape): self
    {
        $this->nomEtape = $nomEtape;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
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

    #[ORM\Column(type: 'decimal', nullable: true)]
    private ?float $montant = null;

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Rapport::class, inversedBy: 'etapeprojets')]
    #[ORM\JoinColumn(name: 'Id_rapport', referencedColumnName: 'id')]
    private ?Rapport $rapport = null;

    public function getRapport(): ?Rapport
    {
        return $this->rapport;
    }

    public function setRapport(?Rapport $rapport): self
    {
        $this->rapport = $rapport;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Article::class, mappedBy: 'etapeprojet')]
    private Collection $articles;

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        if (!$this->articles instanceof Collection) {
            $this->articles = new ArrayCollection();
        }
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->getArticles()->contains($article)) {
            $this->getArticles()->add($article);
        }
        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->getArticles()->removeElement($article);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Rapport::class, mappedBy: 'etapeprojet')]
    private Collection $rapports;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->rapports = new ArrayCollection();
    }

    /**
     * @return Collection<int, Rapport>
     */
    public function getRapports(): Collection
    {
        if (!$this->rapports instanceof Collection) {
            $this->rapports = new ArrayCollection();
        }
        return $this->rapports;
    }

    public function addRapport(Rapport $rapport): self
    {
        if (!$this->getRapports()->contains($rapport)) {
            $this->getRapports()->add($rapport);
        }
        return $this;
    }

    public function removeRapport(Rapport $rapport): self
    {
        $this->getRapports()->removeElement($rapport);
        return $this;
    }

}
