<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

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
    
    
   
    #[ORM\Column(length: 255)]
    private ?string $Realisation_photo = null;

    #[Assert\File(
        maxSize: "10M",
        mimeTypes: ["image/png", "image/jpg", "image/jpeg"],
        maxSizeMessage: "Too big file, 10M is max.",
        mimeTypesMessage: "Please use only images formats - png, jpj, jpeg",
    )] 
    #[Vich\UploadableField(mapping: 'Image', fileNameProperty: 'Realisation_photo', size: 'Realisation_photo')]
    private ?File $realisation_photo_file = null;


    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function __toString()
    {
        return $this->Realisation_nom;
    }

    public function getRealisationPhoto(): ?string
    {
        return $this->Realisation_photo;
    }

    public function setRealisationPhoto(string $Realisation_photo): static
    {
        $this->Realisation_photo = $Realisation_photo;

        return $this;
    }
     
    public function getRealisationPhotoFile(): ?File
    {
        return $this->realisation_photo_file;
    }

    public function setRealisationPhotoFile(?File $realisation_photo_file = null): void
    {
        $this->realisation_photo_file = $realisation_photo_file;
    }
}
