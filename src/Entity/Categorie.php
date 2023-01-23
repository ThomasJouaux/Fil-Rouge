<?php

namespace App\Entity;

use App\Entity\SousCategorie;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;
use App\Controller\ShoesIslandController;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(length: 255)]
    private ?string $categorieNom = null;

    #[ORM\Column(length: 255)]
    private ?string $categorieType = null;

    #[ORM\Column(length: 255)]
    private ?string $categorieImg = null;

    #[ORM\OneToMany(mappedBy: 'Categorie', targetEntity: SousCategorie::class)]
    private Collection $sousCategories;

    public function __construct()
    {
        $this->sousCategories = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getCategorieNom(): ?string
    {
        return $this->categorieNom;
    }

    public function setCategorieNom(string $categorieNom): self
    {
        $this->categorieNom = $categorieNom;

        return $this;
    }

    public function getCategorieType(): ?string
    {
        return $this->categorieType;
    }

    public function setCategorieType(string $categorieType): self
    {
        $this->categorieType = $categorieType;

        return $this;
    }

    public function getCategorieImg(): ?string
    {
        return $this->categorieImg;
    }

    public function setCategorieImg(string $categorieImg): self
    {
        $this->categorieImg = $categorieImg;

        return $this;
    }

    /**
     * @return Collection<int, SousCategorie>
     */
    public function getSousCategories(): Collection
    {
        return $this->sousCategories;
    }

    public function addSousCategory(SousCategorie $sousCategory): self
    {
        if (!$this->sousCategories->contains($sousCategory)) {
            $this->sousCategories->add($sousCategory);
            $sousCategory->setCategorie($this);
        }

        return $this;
    }

    public function removeSousCategory(SousCategorie $sousCategory): self
    {
        if ($this->sousCategories->removeElement($sousCategory)) {
            // set the owning side to null (unless already changed)
            if ($sousCategory->getCategorie() === $this) {
                $sousCategory->setCategorie(null);
            }
        }

        return $this;
    }

    
  
}
