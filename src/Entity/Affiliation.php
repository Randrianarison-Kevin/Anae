<?php

namespace App\Entity;

use App\Repository\AffiliationRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: AffiliationRepository::class)]
class Affiliation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Affiliation_nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Affiliation_logo = null;

    #[Vich\UploadableField(mapping: 'Image', fileNameProperty: 'Affiliation_logo', size: 'Affiliation_logo')]
    private ?File $Affiliation_logo_file = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffiliationNom(): ?string
    {
        return $this->Affiliation_nom;
    }

    public function setAffiliationNom(string $Affiliation_nom): static
    {
        $this->Affiliation_nom = $Affiliation_nom;

        return $this;
    }

    public function getAffiliationLogo(): ?string
    {
        return $this->Affiliation_logo;
    }

    public function setAffiliationLogo(?string $Affiliation_logo): static
    {
        $this->Affiliation_logo = $Affiliation_logo;

        return $this;
    }

    public function getAffiliationLogoFile(): ?File
    {
        return $this->Affiliation_logo_file;
    }

    public function setAffiliationLogoFile(?File $Affiliation_logo_file = null): void
    {
        $this->Affiliation_logo_file = $Affiliation_logo_file;
    }

}
