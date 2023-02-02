<?php

namespace App\Entity;

use App\Repository\LivraisonProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonProduitRepository::class)]
class LivraisonProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livraisonProduits')]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(inversedBy: 'livraisonProduits')]
    private ?Livraison $livraison = null;

    #[ORM\Column]
    private ?int $quantiteProduitLivre = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getQuantiteProduitLivre(): ?int
    {
        return $this->quantiteProduitLivre;
    }

    public function setQuantiteProduitLivre(int $quantiteProduitLivre): self
    {
        $this->quantiteProduitLivre = $quantiteProduitLivre;

        return $this;
    }

}
