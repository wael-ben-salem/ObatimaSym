<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\FournisseurRepository;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
#[ORM\Table(name: 'fournisseur')]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nom = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $prenom = null;

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $email = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $numero_de_telephone = null;

    public function getNumero_de_telephone(): ?string
    {
        return $this->numero_de_telephone;
    }

    public function setNumero_de_telephone(?string $numero_de_telephone): self
    {
        $this->numero_de_telephone = $numero_de_telephone;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $adresse = null;

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Article::class, mappedBy: 'fournisseur')]
    private Collection $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        if (!$this->articles instanceof Collection) {
            $this->articles = new ArrayCollection();
        }
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->getArticles()->contains($article)) {
            $this->getArticles()->add($article);
        }
        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->getArticles()->removeElement($article);
        return $this;
    }

    public function getNumeroDeTelephone(): ?string
    {
        return $this->numero_de_telephone;
    }

    public function setNumeroDeTelephone(?string $numero_de_telephone): static
    {
        $this->numero_de_telephone = $numero_de_telephone;

        return $this;
    }

}
