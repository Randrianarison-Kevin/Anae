<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Projet_description = null;

    #[ORM\OneToMany(mappedBy: 'Projets', targetEntity: Media::class)]
    private Collection $media;

    #[ORM\OneToMany(mappedBy: 'Projets', targetEntity: Actualite::class)]
    private Collection $actualites;

    #[ORM\Column(length: 255)]
    private ?string $Projet_titre = null;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->actualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjetDescription(): ?string
    {
        return $this->Projet_description;
    }

    public function setProjetDescription(string $Projet_description): static
    {
        $this->Projet_description = $Projet_description;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
            $medium->setProjets($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getProjets() === $this) {
                $medium->setProjets(null);
            }
        }

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
            $actualite->setProjets($this);
        }

        return $this;
    }

    public function removeActualite(Actualite $actualite): static
    {
        if ($this->actualites->removeElement($actualite)) {
            // set the owning side to null (unless already changed)
            if ($actualite->getProjets() === $this) {
                $actualite->setProjets(null);
            }
        }

        return $this;
    }

    public function getProjetTitre(): ?string
    {
        return $this->Projet_titre;
    }

    public function setProjetTitre(string $Projet_titre): static
    {
        $this->Projet_titre = $Projet_titre;

        return $this;
    }

    public function __toString():string
    {   
        return $this->Projet_titre;
    }

}
