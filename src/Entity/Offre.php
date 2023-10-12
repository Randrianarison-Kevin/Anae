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

    #[ORM\Column(length: 255)]
    private ?string $Offre_fichier = null;

    public function __construct()
    {
    }

    public function getOffreId(): ?int
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

    public function getOffreFichier(): ?string
    {
        return $this->Offre_fichier;
    }

    public function setOffreFichier(string $Offre_fichier): static
    {
        $this->Offre_fichier = $Offre_fichier;

        return $this;
    }
}
