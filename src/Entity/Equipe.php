<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Equipe_photos = null;

    #[Assert\File(
        maxSize: "100M",
        mimeTypes: ["image/png", "image/jpg", "image/jpeg"],
        maxSizeMessage: "Too big file, 10M is max.",
        mimeTypesMessage: "Please use only images formats - png, jpj, jpeg",
    )] 
    #[Vich\UploadableField(mapping: 'Image', fileNameProperty: 'Equipe_photos', size: 'Equipe_photos')]
    private ?File $Equipe_photos_file = null;

    #[ORM\Column(length: 255)]
    private ?string $Equipe_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Equipe_fonctions = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Equipe_presentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipePhotos(): ?string
    {
        return $this->Equipe_photos;
    }

    public function setEquipePhotos(string $Equipe_photos): static
    {
        $this->Equipe_photos = $Equipe_photos;

        return $this;
    }

    public function getEquipePhotosFile(): ?File
    {
        return $this->Equipe_photos_file;
    }

    public function setEquipePhotosFile(?File $Equipe_photos_file = null): void
    {
        $this->Equipe_photos_file = $Equipe_photos_file;
    }


    public function getEquipeNom(): ?string
    {
        return $this->Equipe_nom;
    }

    public function setEquipeNom(string $Equipe_nom): static
    {
        $this->Equipe_nom = $Equipe_nom;

        return $this;
    }

    public function getEquipeFonctions(): ?string
    {
        return $this->Equipe_fonctions;
    }

    public function setEquipeFonctions(string $Equipe_fonctions): static
    {
        $this->Equipe_fonctions = $Equipe_fonctions;

        return $this;
    }

    public function getEquipePresentation(): ?string
    {
        return $this->Equipe_presentation;
    }

    public function setEquipePresentation(string $Equipe_presentation): static
    {
        $this->Equipe_presentation = $Equipe_presentation;

        return $this;
    }
}
