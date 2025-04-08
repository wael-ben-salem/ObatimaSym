<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ArtisanRepository;

#[ORM\Entity(repositoryClass: ArtisanRepository::class)]
#[ORM\Table(name: 'artisan')]
class Artisan
{
    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'artisans')]
    #[ORM\JoinColumn(name: 'artisan_id', referencedColumnName: 'id')]
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $specialite = null;

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;
        return $this;
    }

    #[ORM\Column(type: 'decimal', nullable: false)]
    private ?float $salaire_heure = null;

    public function getSalaire_heure(): ?float
    {
        return $this->salaire_heure;
    }

    public function setSalaire_heure(float $salaire_heure): self
    {
        $this->salaire_heure = $salaire_heure;
        return $this;
    }

    #[ORM\ManyToMany(targetEntity: Equipe::class, inversedBy: 'artisans')]
    #[ORM\JoinTable(
        name: 'equipe_artisan',
        joinColumns: [
            new ORM\JoinColumn(name: 'artisan_id', referencedColumnName: 'artisan_id')
        ],
        inverseJoinColumns: [
            new ORM\JoinColumn(name: 'equipe_id', referencedColumnName: 'id')
        ]
    )]
    private Collection $equipes;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        if (!$this->equipes instanceof Collection) {
            $this->equipes = new ArrayCollection();
        }
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->getEquipes()->contains($equipe)) {
            $this->getEquipes()->add($equipe);
        }
        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        $this->getEquipes()->removeElement($equipe);
        return $this;
    }

    public function getSalaireHeure(): ?string
    {
        return $this->salaire_heure;
    }

    public function setSalaireHeure(string $salaire_heure): static
    {
        $this->salaire_heure = $salaire_heure;

        return $this;
    }

}
