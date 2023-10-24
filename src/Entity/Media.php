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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Media_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Media_photo = null;

    #[Vich\UploadableField(mapping: 'Image', fileNameProperty: 'Media_photo', size: 'Media_photo')]
    private ?File $Media_photo_file = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Media_document = null;
    
    #[Vich\UploadableField(mapping: 'Document')]
    private ?File $Media_document_file = null;
   
    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Actualite $Actualites = null;


    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Realisation $Realisations = null;

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

    public function getMediaPhoto(): ?string
    {
        return $this->Media_photo;
    }

    public function setMediaPhoto(string $Media_photo): static
    {
        $this->Media_photo = $Media_photo;

        return $this;
    }

    public function getMediaDocument(): ?string
    {
        return $this->Media_document;
    }

    public function setMediaDocument(?string $Media_document): static
    {
        $this->Media_document = $Media_document;

        return $this;
    }

    public function getMediaPhotoFile(): ?File
    {
        return $this->Media_photo_file;
    }

    public function setMediaPhotoFile(?File $Media_photo_file = null): void
    {
        $this->Media_photo_file = $Media_photo_file;
    }

    public function getMediaDocumentFile(): ?File
    {
        return $this->Media_document_file;
    }

    public function setMediaDocumentFile(?File $Media_document_file = null): void
    {
        $this->Media_document_file = $Media_document_file;
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
}
