<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
#[Vich\Uploadable]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Media_photo = null;

    #[Vich\UploadableField(mapping: 'Image', fileNameProperty: 'Media_photo', size: 'Media_photo')]
    private ?File $Media_photo_file = null;

    #[ORM\Column(length: 255, nullable: true, type:'string')]
    private ?string $Media_video = null;

    #[Vich\UploadableField(mapping: 'Video', fileNameProperty: 'Media_video', size: 'Media_video')]
    private ?File $Media_video_file = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Actualite $Actualites = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Projet $Projets = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Realisation $Realisations = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaPhoto(): ?string
    {
        return $this->Media_photo;
    }

    public function setMediaPhoto(string $Media_photo): static
    {
        $this->Media_photo = $Media_photo;

        return $this;
    }

    public function getMediaVideo(): ?string
    {
        return $this->Media_video;
    }

    public function setMediaVideo(?string $Media_video): static
    {
        $this->Media_video = $Media_video;

        return $this;
    }

   
    public function getMediaVideoFile(): ?File
    {
        return $this->Media_video_file;
    }

    public function setMediaVideoFile(?File $Media_video_file = null): void
    {
        $this->Media_video_file = $Media_video_file;
    }

    public function getMediaPhotoFile(): ?File
    {
        return $this->Media_photo_file;
    }

    public function setMediaPhotoFile(?File $Media_photo_file = null): void
    {
        $this->Media_photo_file = $Media_photo_file;
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

    public function getProjets(): ?Projet
    {
        return $this->Projets;
    }

    public function setProjets(?Projet $Projets): static
    {
        $this->Projets = $Projets;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }
}
