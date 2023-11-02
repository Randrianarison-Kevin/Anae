<?php

namespace App\Entity;

use App\Repository\VisionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisionRepository::class)]
class Vision
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $Vision_titre = null;

    #[ORM\Column(length: 255)]
    private ?string $Vision_contenu = null;

    public function getVisionId(): ?int
    {
        return $this->id;
    }

    public function getVisionTitre(): ?string
    {
        return $this->Vision_titre;
    }

    public function setVisionTitre(string $Vision_titre): static
    {
        $this->Vision_titre = $Vision_titre;

        return $this;
    }

    public function getVisionContenu(): ?string
    {
        return $this->Vision_contenu;
    }

    public function setVisionContenu(string $Vision_contenu): static
    {
        $this->Vision_contenu = $Vision_contenu;

        return $this;
    }
}
