<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\RapportRepository;

#[ORM\Entity(repositoryClass: RapportRepository::class)]
#[ORM\Table(name: 'rapport')]
class Rapport
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

    #[ORM\ManyToOne(targetEntity: Etapeprojet::class, inversedBy: 'rapports')]
    #[ORM\JoinColumn(name: 'Id_etapeProjet', referencedColumnName: 'Id_etapeProjet')]
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $titre = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $contenu = null;

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
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

    #[ORM\OneToMany(targetEntity: Etapeprojet::class, mappedBy: 'rapport')]
    private Collection $etapeprojets;

    public function __construct()
    {
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
