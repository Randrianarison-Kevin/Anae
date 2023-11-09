<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\Cascade;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
#[Vich\Uploadable]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Media_description = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Actualite $Actualites = null;


    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Realisation $Realisations = null;

    #[ORM\OneToMany(mappedBy: 'media', targetEntity: Image::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Media_description;
    }

    public function setDescription(string $Media_description): static
    {
        $this->Media_description = $Media_description;

        return $this;
    }

   

    public function getActualites(): ?Actualite
    {
        return $this->Actualites;
    }

    public function setActualites(?Actualite $Actualites): static
    {
        $this->Actualites = $Actualites;

        return $this;
    }

    public function getRealisations(): ?Realisation
    {
        return $this->Realisations;
    }

    public function setRealisations(?Realisation $Realisations): static
    {
        $this->Realisations = $Realisations;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setMedia($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getMedia() === $this) {
                $image->setMedia(null);
            }
        }

        return $this;
    }
   
}
