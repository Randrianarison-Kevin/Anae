<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Offre_titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Offre_contenu = null;

    #[ORM\OneToMany(mappedBy: 'Offres', targetEntity: Actualite::class)]
    private Collection $actualites;

    public function __construct()
    {
        $this->actualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreTitre(): ?string
    {
        return $this->Offre_titre;
    }

    public function setOffreTitre(string $Offre_titre): static
    {
        $this->Offre_titre = $Offre_titre;

        return $this;
    }

    public function getOffreContenu(): ?string
    {
        return $this->Offre_contenu;
    }

    public function setOffreContenu(string $Offre_contenu): static
    {
        $this->Offre_contenu = $Offre_contenu;

        return $this;
    }

   

    /**
     * @return Collection<int, Actualite>
     */
    public function getActualites(): Collection
    {
        return $this->actualites;
    }

    public function addActualite(Actualite $actualite): static
    {
        if (!$this->actualites->contains($actualite)) {
            $this->actualites->add($actualite);
            $actualite->setOffres($this);
        }

        return $this;
    }

    public function removeActualite(Actualite $actualite): static
    {
        if ($this->actualites->removeElement($actualite)) {
            // set the owning side to null (unless already changed)
            if ($actualite->getOffres() === $this) {
                $actualite->setOffres(null);
            }
        }

        return $this;
    }
    public function __toString():string
    {   
        return $this->Offre_titre;
    }
}
