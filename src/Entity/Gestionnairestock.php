<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\GestionnairestockRepository;

#[ORM\Entity(repositoryClass: GestionnairestockRepository::class)]
#[ORM\Table(name: 'gestionnairestock')]
class Gestionnairestock
{
    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'gestionnairestocks')]
    #[ORM\JoinColumn(name: 'gestionnairestock_id', referencedColumnName: 'id')]
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

    #[ORM\OneToOne(targetEntity: Equipe::class, mappedBy: 'gestionnairestock')]
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

}
