<?php

namespace App\Entity;

use App\Repository\SeComposeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeComposeRepository::class)]
class SeCompose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'seComposes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(inversedBy: 'seComposes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\OneToMany(mappedBy: 'SeCompose', targetEntity: AdresseLivraison::class)]
    private Collection $adresseLivraisons;

    public function __construct()
    {
        $this->adresseLivraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
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

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * @return Collection<int, AdresseLivraison>
     */
    public function getAdresseLivraisons(): Collection
    {
        return $this->adresseLivraisons;
    }

    public function addAdresseLivraison(AdresseLivraison $adresseLivraison): self
    {
        if (!$this->adresseLivraisons->contains($adresseLivraison)) {
            $this->adresseLivraisons->add($adresseLivraison);
            $adresseLivraison->setSeCompose($this);
        }

        return $this;
    }

    public function removeAdresseLivraison(AdresseLivraison $adresseLivraison): self
    {
        if ($this->adresseLivraisons->removeElement($adresseLivraison)) {
            // set the owning side to null (unless already changed)
            if ($adresseLivraison->getSeCompose() === $this) {
                $adresseLivraison->setSeCompose(null);
            }
        }

        return $this;
    }
}
