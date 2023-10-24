<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
#[ORM\Entity(repositoryClass: ActualiteRepository::class)]
class Actualite 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Actualite_titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Actualite_contenu = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'Actualites', targetEntity: Media::class)]
    private Collection $media;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Actualite_image = null;

    #[Vich\UploadableField(mapping: 'Image', fileNameProperty: 'Actualite_image', size: 'Actualite_image')]
    private ?File $Actualite_image_file = null;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActualiteTitre(): ?string
    {
        return $this->Actualite_titre;
    }

    public function setActualiteTitre(string $Actualite_titre): static
    {
        $this->Actualite_titre = $Actualite_titre;

        return $this;
    }

    public function getActualiteContenu(): ?string
    {
        return $this->Actualite_contenu;
    }

    public function setActualiteContenu(string $Actualite_contenu): static
    {
        $this->Actualite_contenu = $Actualite_contenu;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

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
            $medium->setActualites($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        if ($this->media->removeElement($medium)) {
          
            if ($medium->getActualites() === $this) {
                $medium->setActualites(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Actualite_titre;
    }

    public function getActualiteImage(): ?string
    {
        return $this->Actualite_image;
    }

    public function setActualiteImage(?string $Actualite_image): static
    {
        $this->Actualite_image = $Actualite_image;

        return $this;
    }
    
    public function getMediaPhotoFile(): ?File
    {
        return $this->Actualite_image_file;
    }

    public function setMediaPhotoFile(?File $Actualite_image_file = null): void
    {
        $this->Actualite_image_file = $Actualite_image_file;
    }

}
