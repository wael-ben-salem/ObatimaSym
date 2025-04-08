<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\VisiteRepository;

#[ORM\Entity(repositoryClass: VisiteRepository::class)]
#[ORM\Table(name: 'visite')]
class Visite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $IdVisite = null;

    public function getIdVisite(): ?int
    {
        return $this->IdVisite;
    }

    public function setIdVisite(int $IdVisite): self
    {
        $this->IdVisite = $IdVisite;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $dateVisite = null;

    public function getDateVisite(): ?\DateTimeInterface
    {
        return $this->dateVisite;
    }

    public function setDateVisite(\DateTimeInterface $dateVisite): self
    {
        $this->dateVisite = $dateVisite;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $observations = null;

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Terrain::class, inversedBy: 'visites')]
    #[ORM\JoinColumn(name: 'IdTerrain', referencedColumnName: 'Id_terrain')]
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

}
