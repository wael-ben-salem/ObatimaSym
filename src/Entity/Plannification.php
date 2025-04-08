<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\PlannificationRepository;

#[ORM\Entity(repositoryClass: PlannificationRepository::class)]
#[ORM\Table(name: 'plannification')]
class Plannification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_plannification = null;

    public function getId_plannification(): ?int
    {
        return $this->id_plannification;
    }

    public function setId_plannification(int $id_plannification): self
    {
        $this->id_plannification = $id_plannification;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $id_tache = null;

    public function getId_tache(): ?int
    {
        return $this->id_tache;
    }

    public function setId_tache(?int $id_tache): self
    {
        $this->id_tache = $id_tache;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $priorite = null;

    public function getPriorite(): ?string
    {
        return $this->priorite;
    }

    public function setPriorite(?string $priorite): self
    {
        $this->priorite = $priorite;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $date_planifiee = null;

    public function getDate_planifiee(): ?\DateTimeInterface
    {
        return $this->date_planifiee;
    }

    public function setDate_planifiee(\DateTimeInterface $date_planifiee): self
    {
        $this->date_planifiee = $date_planifiee;
        return $this;
    }

    #[ORM\Column(type: 'time', nullable: true)]
    private ?string $heure_debut = null;

    public function getHeure_debut(): ?string
    {
        return $this->heure_debut;
    }

    public function setHeure_debut(?string $heure_debut): self
    {
        $this->heure_debut = $heure_debut;
        return $this;
    }

    #[ORM\Column(type: 'time', nullable: true)]
    private ?string $heure_fin = null;

    public function getHeure_fin(): ?string
    {
        return $this->heure_fin;
    }

    public function setHeure_fin(?string $heure_fin): self
    {
        $this->heure_fin = $heure_fin;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $remarques = null;

    public function getRemarques(): ?string
    {
        return $this->remarques;
    }

    public function setRemarques(?string $remarques): self
    {
        $this->remarques = $remarques;
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

    public function getIdPlannification(): ?int
    {
        return $this->id_plannification;
    }

    public function getIdTache(): ?int
    {
        return $this->id_tache;
    }

    public function setIdTache(?int $id_tache): static
    {
        $this->id_tache = $id_tache;

        return $this;
    }

    public function getDatePlanifiee(): ?\DateTimeInterface
    {
        return $this->date_planifiee;
    }

    public function setDatePlanifiee(\DateTimeInterface $date_planifiee): static
    {
        $this->date_planifiee = $date_planifiee;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heure_debut;
    }

    public function setHeureDebut(?\DateTimeInterface $heure_debut): static
    {
        $this->heure_debut = $heure_debut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heure_fin;
    }

    public function setHeureFin(?\DateTimeInterface $heure_fin): static
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

}
