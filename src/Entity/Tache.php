<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\TacheRepository;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
#[ORM\Table(name: 'tache')]
class Tache
{
    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_tache = null;

    public function getId_tache(): ?int
    {
        return $this->id_tache;
    }

    public function setId_tache(int $id_tache): self
    {
        $this->id_tache = $id_tache;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $Id_projet = null;

    public function getId_projet(): ?int
    {
        return $this->Id_projet;
    }

    public function setId_projet(?int $Id_projet): self
    {
        $this->Id_projet = $Id_projet;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $constructeur_id = null;

    public function getConstructeur_id(): ?int
    {
        return $this->constructeur_id;
    }

    public function setConstructeur_id(?int $constructeur_id): self
    {
        $this->constructeur_id = $constructeur_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $artisan_id = null;

    public function getArtisan_id(): ?int
    {
        return $this->artisan_id;
    }

    public function setArtisan_id(?int $artisan_id): self
    {
        $this->artisan_id = $artisan_id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
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

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $date_debut = null;

    public function getDate_debut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDate_debut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    public function getDate_fin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDate_fin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;
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

    public function getIdTache(): ?int
    {
        return $this->id_tache;
    }

    public function setIdTache(int $id_tache): static
    {
        $this->id_tache = $id_tache;

        return $this;
    }

    public function getIdProjet(): ?int
    {
        return $this->Id_projet;
    }

    public function setIdProjet(?int $Id_projet): static
    {
        $this->Id_projet = $Id_projet;

        return $this;
    }

    public function getConstructeurId(): ?int
    {
        return $this->constructeur_id;
    }

    public function setConstructeurId(?int $constructeur_id): static
    {
        $this->constructeur_id = $constructeur_id;

        return $this;
    }

    public function getArtisanId(): ?int
    {
        return $this->artisan_id;
    }

    public function setArtisanId(?int $artisan_id): static
    {
        $this->artisan_id = $artisan_id;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

}
