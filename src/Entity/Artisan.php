<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artisan
 */
#[ORM\Table(name: 'artisan')]
#[ORM\Entity]
class Artisan
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'specialite', type: 'string', length: 0, nullable: false)]
    private $specialite;

    /**
     * @var string
     */
    #[ORM\Column(name: 'salaire_heure', type: 'decimal', precision: 10, scale: 2, nullable: false)]
    private $salaireHeure;

    /**
     * @var \Utilisateur
     */
    #[ORM\JoinColumn(name: 'artisan_id', referencedColumnName: 'id')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: \Utilisateur::class)]
    private $artisan;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: \Equipe::class, mappedBy: 'artisan')]
    private $equipe = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipe = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getSalaireHeure(): ?string
    {
        return $this->salaireHeure;
    }

    public function setSalaireHeure(string $salaireHeure): static
    {
        $this->salaireHeure = $salaireHeure;

        return $this;
    }

    public function getArtisan(): ?Utilisateur
    {
        return $this->artisan;
    }

    public function setArtisan(?Utilisateur $artisan): static
    {
        $this->artisan = $artisan;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe(): Collection
    {
        return $this->equipe;
    }

    public function addEquipe(Equipe $equipe): static
    {
        if (!$this->equipe->contains($equipe)) {
            $this->equipe->add($equipe);
            $equipe->addArtisan($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipe->removeElement($equipe)) {
            $equipe->removeArtisan($this);
        }

        return $this;
    }

}
