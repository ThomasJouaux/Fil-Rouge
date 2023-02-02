<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable:false)]
    private ?Commande $commande = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: LivraisonProduit::class)]
    private Collection $livraisonProduits;

    public function __construct()
    {
        $this->livraisonProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, LivraisonProduit>
     */
    public function getLivraisonProduits(): Collection
    {
        return $this->livraisonProduits;
    }

    public function addLivraisonProduit(LivraisonProduit $livraisonProduit): self
    {
        if (!$this->livraisonProduits->contains($livraisonProduit)) {
            $this->livraisonProduits->add($livraisonProduit);
            $livraisonProduit->setLivraison($this);
        }

        return $this;
    }

    public function removeLivraisonProduit(LivraisonProduit $livraisonProduit): self
    {
        if ($this->livraisonProduits->removeElement($livraisonProduit)) {
            // set the owning side to null (unless already changed)
            if ($livraisonProduit->getLivraison() === $this) {
                $livraisonProduit->setLivraison(null);
            }
        }

        return $this;
    }
}
