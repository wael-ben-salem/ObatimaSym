<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ArticleRepository;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ORM\Table(name: 'article')]
class Article
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

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $prix_unitaire = null;

    public function getPrix_unitaire(): ?string
    {
        return $this->prix_unitaire;
    }

    public function setPrix_unitaire(?string $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $photo = null;

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Stock::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(name: 'stock_id', referencedColumnName: 'id')]
    private ?Stock $stock = null;

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(name: 'fournisseur_id', referencedColumnName: 'id')]
    private ?Fournisseur $fournisseur = null;

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Etapeprojet::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(name: 'etapeprojet_id', referencedColumnName: 'Id_etapeProjet')]
    private ?Etapeprojet $etapeprojet = null;

    public function getEtapeprojet(): ?Etapeprojet
    {
        return $this->etapeprojet;
    }

    public function setEtapeprojet(?Etapeprojet $etapeprojet): self
    {
        $this->etapeprojet = $etapeprojet;
        return $this;
    }

    public function getPrixUnitaire(): ?string
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(?string $prix_unitaire): static
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

}
