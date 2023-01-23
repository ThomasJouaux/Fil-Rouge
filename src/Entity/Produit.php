<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column] 
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomProduit = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $typeProduit = null;
    #[ORM\Column(length: 255)]
    private ?string $sexeProduit = null;

    #[ORM\Column]
    private ?int $qteStock = null;

    #[ORM\Column]
    private ?int $prixProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $couleurProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $imgProduit = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?SousCategorie $SousCategorie = null;

    #[ORM\Column]
    private ?int $tvaProduit = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: SeCompose::class)]
    private Collection $seComposes;


    public function __construct()
    {
        $this->seComposes = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }


    public function getSexeProduit(): ?string
    {
        return $this->sexeProduit;
    }

    public function setSexeProduit(string $sexeProduit): self
    {
        $this->sexeProduit = $sexeProduit;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->descriptionProduit;
    }

    public function setDescriptionProduit(?string $descriptionProduit): self
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    public function getTypeProduit(): ?string
    {
        return $this->typeProduit;
    }

    public function setTypeProduit(string $typeProduit): self
    {
        $this->typeProduit = $typeProduit;

        return $this;
    }

    public function getQteStock(): ?int
    {
        return $this->qteStock;
    }

    public function setQteStock(int $qteStock): self
    {
        $this->qteStock = $qteStock;

        return $this;
    }

    public function getPrixProduit(): ?int
    {
        return $this->prixProduit;
    }

    public function setPrixProduit(int $prixProduit): self
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    public function getCouleurProduit(): ?string
    {
        return $this->couleurProduit;
    }

    public function setCouleurProduit(string $couleurProduit): self
    {
        $this->couleurProduit = $couleurProduit;

        return $this;
    }

    public function getImgProduit(): ?string
    {
        return $this->imgProduit;
    }

    public function setImgProduit(string $imgProduit): self
    {
        $this->imgProduit = $imgProduit;

        return $this;
    }

    public function getSousCategorie(): ?SousCategorie
    {
        return $this->SousCategorie;
    }

    public function setSousCategorie(?SousCategorie $SousCategorie): self
    {
        $this->SousCategorie = $SousCategorie;

        return $this;
    }

    public function getTvaProduit(): ?int
    {
        return $this->tvaProduit;
    }

    public function setTvaProduit(int $tvaProduit): self
    {
        $this->tvaProduit = $tvaProduit;

        return $this;
    }

    /**
     * @return Collection<int, SeCompose>
     */
    public function getSeComposes(): Collection
    {
        return $this->seComposes;
    }

    public function addSeCompose(SeCompose $seCompose): self
    {
        if (!$this->seComposes->contains($seCompose)) {
            $this->seComposes->add($seCompose);
            $seCompose->setProduit($this);
        }

        return $this;
    }

    public function removeSeCompose(SeCompose $seCompose): self
    {
        if ($this->seComposes->removeElement($seCompose)) {
            // set the owning side to null (unless already changed)
            if ($seCompose->getProduit() === $this) {
                $seCompose->setProduit(null);
            }
        }

        return $this;
    }
    
}
