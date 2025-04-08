<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\AbonnementRepository;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
#[ORM\Table(name: 'abonnement')]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_abonnement = null;

    public function getId_abonnement(): ?int
    {
        return $this->id_abonnement;
    }

    public function setId_abonnement(int $id_abonnement): self
    {
        $this->id_abonnement = $id_abonnement;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $nom_abonnement = null;

    public function getNom_abonnement(): ?string
    {
        return $this->nom_abonnement;
    }

    public function setNom_abonnement(?string $nom_abonnement): self
    {
        $this->nom_abonnement = $nom_abonnement;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $duree = null;

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;
        return $this;
    }

    #[ORM\Column(type: 'decimal', nullable: true)]
    private ?float $prix = null;

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getIdAbonnement(): ?int
    {
        return $this->id_abonnement;
    }

    public function getNomAbonnement(): ?string
    {
        return $this->nom_abonnement;
    }

    public function setNomAbonnement(?string $nom_abonnement): static
    {
        $this->nom_abonnement = $nom_abonnement;

        return $this;
    }

}
