<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ConstructeurRepository;

#[ORM\Entity(repositoryClass: ConstructeurRepository::class)]
#[ORM\Table(name: 'constructeur')]
class Constructeur
{
    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'constructeurs')]
    #[ORM\JoinColumn(name: 'constructeur_id', referencedColumnName: 'id')]
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

    #[ORM\OneToOne(targetEntity: Equipe::class, mappedBy: 'constructeur')]
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
