<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisationRepository::class)]
class Realisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Realisation_nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Realisation_contenu = null;

    #[ORM\OneToMany(mappedBy: 'Realisations', targetEntity: Media::class)]
    private Collection $media;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getRealisationId(): ?int
    {
        return $this->id;
    }

    public function getRealisationNom(): ?string
    {
        return $this->Realisation_nom;
    }

    public function setRealisationNom(string $Realisation_nom): static
    {
        $this->Realisation_nom = $Realisation_nom;

        return $this;
    }

    public function getRealisationContenu(): ?string
    {
        return $this->Realisation_contenu;
    }

    public function setRealisationContenu(string $Realisation_contenu): static
    {
        $this->Realisation_contenu = $Realisation_contenu;

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
            $medium->setRealisations($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getRealisations() === $this) {
                $medium->setRealisations(null);
            }
        }

        return $this;
    }
}
