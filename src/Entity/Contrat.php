<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ContratRepository;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
#[ORM\Table(name: 'contrat')]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_contrat = null;

    public function getId_contrat(): ?int
    {
        return $this->id_contrat;
    }

    public function setId_contrat(int $id_contrat): self
    {
        $this->id_contrat = $id_contrat;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $type_contrat = null;

    public function getType_contrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setType_contrat(string $type_contrat): self
    {
        $this->type_contrat = $type_contrat;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_signature = null;

    public function getDate_signature(): ?\DateTimeInterface
    {
        return $this->date_signature;
    }

    public function setDate_signature(?\DateTimeInterface $date_signature): self
    {
        $this->date_signature = $date_signature;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    public function getDate_debut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDate_debut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $signature_electronique = null;

    public function getSignature_electronique(): ?string
    {
        return $this->signature_electronique;
    }

    public function setSignature_electronique(?string $signature_electronique): self
    {
        $this->signature_electronique = $signature_electronique;
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

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $montant_total = null;

    public function getMontant_total(): ?int
    {
        return $this->montant_total;
    }

    public function setMontant_total(?int $montant_total): self
    {
        $this->montant_total = $montant_total;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Projet::class, inversedBy: 'contrats')]
    #[ORM\JoinColumn(name: 'Id_projet', referencedColumnName: 'Id_projet')]
    private ?Projet $projet = null;

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;
        return $this;
    }

    public function getIdContrat(): ?int
    {
        return $this->id_contrat;
    }

    public function getTypeContrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(string $type_contrat): static
    {
        $this->type_contrat = $type_contrat;

        return $this;
    }

    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->date_signature;
    }

    public function setDateSignature(?\DateTimeInterface $date_signature): static
    {
        $this->date_signature = $date_signature;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getSignatureElectronique(): ?string
    {
        return $this->signature_electronique;
    }

    public function setSignatureElectronique(?string $signature_electronique): static
    {
        $this->signature_electronique = $signature_electronique;

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

    public function getMontantTotal(): ?int
    {
        return $this->montant_total;
    }

    public function setMontantTotal(?int $montant_total): static
    {
        $this->montant_total = $montant_total;

        return $this;
    }

}
