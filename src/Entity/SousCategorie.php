<?php

namespace App\Entity;

use App\Entity\Produit;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SousCategorieRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: SousCategorieRepository::class)]
class SousCategorie
{
    
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $SousCategorieType = null;

    #[ORM\Column(length: 255)]
    private ?string $SousCategorieSexe = null;

    #[ORM\Column(length: 255)]
    private ?string $SousCategorieNom = null;

    #[ORM\ManyToOne(inversedBy: 'sousCategories')]
    private ?Categorie $Categorie = null;

    #[ORM\OneToMany(mappedBy: 'SousCategorie', targetEntity: Produit::class)]
    private Collection $produits;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSousCategorieType(): ?string
    {
        return $this->SousCategorieType;
    }

    public function setSousCategorieType(string $SousCategorieType): self
    {
        $this->SousCategorieType = $SousCategorieType;

        return $this;
    }

    public function getSousCategorieSexe(): ?string
    {
        return $this->SousCategorieSexe;
    }

    public function setSousCategorieSexe(string $SousCategorieSexe): self
    {
        $this->SousCategorieSexe = $SousCategorieSexe;

        return $this;
    }

    public function getSousCategorieNom(): ?string
    {
        return $this->SousCategorieNom;
    }

    public function setSousCategorieNom(string $SousCategorieNom): self
    {
        $this->SousCategorieNom = $SousCategorieNom;

        return $this;
    }

    public function getSousCategorie(): ?self
    {
        return $this->SousCategorie;
    }

    public function setSousCategorie(?self $SousCategorie): self
    {
        $this->SousCategorie = $SousCategorie;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setSousCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getSousCategorie() === $this) {
                $produit->setSousCategorie(null);
            }
        }

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

   
}
