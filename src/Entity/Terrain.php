<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\TerrainRepository;

#[ORM\Entity(repositoryClass: TerrainRepository::class)]
#[ORM\Table(name: 'terrain')]
class Terrain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $Id_terrain = null;

    
    public function getId_Terrain(): ?int
    {
        return $this->Id_terrain;
    }

    public function setId_terrain(int $Id_terrain): self
    {
        $this->Id_terrain = $Id_terrain;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $emplacement = null;

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): self
    {
        $this->emplacement = $emplacement;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $caracteristiques = null;

    public function getCaracteristiques(): ?string
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(string $caracteristiques): self
    {
        $this->caracteristiques = $caracteristiques;
        return $this;
    }

    #[ORM\Column(type: 'decimal', nullable: true)]
    private ?float $superficie = null;

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(?float $superficie): self
    {
        $this->superficie = $superficie;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $detailsGeo = null;

    public function getDetailsGeo(): ?string
    {
        return $this->detailsGeo;
    }

    public function setDetailsGeo(?string $detailsGeo): self
    {
        $this->detailsGeo = $detailsGeo;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Projet::class, mappedBy: 'terrain')]
    private Collection $projets;

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        if (!$this->projets instanceof Collection) {
            $this->projets = new ArrayCollection();
        }
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->getProjets()->contains($projet)) {
            $this->getProjets()->add($projet);
        }
        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        $this->getProjets()->removeElement($projet);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Visite::class, mappedBy: 'terrain')]
    private Collection $visites;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
        $this->visites = new ArrayCollection();
    }

    /**
     * @return Collection<int, Visite>
     */
    public function getVisites(): Collection
    {
        if (!$this->visites instanceof Collection) {
            $this->visites = new ArrayCollection();
        }
        return $this->visites;
    }

    public function addVisite(Visite $visite): self
    {
        if (!$this->getVisites()->contains($visite)) {
            $this->getVisites()->add($visite);
        }
        return $this;
    }

    public function removeVisite(Visite $visite): self
    {
        $this->getVisites()->removeElement($visite);
        return $this;
    }


}
