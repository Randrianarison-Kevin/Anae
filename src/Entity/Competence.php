<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Competence_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Competence_contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetenceNom(): ?string
    {
        return $this->Competence_nom;
    }

    public function setCompetenceNom(string $Competence_nom): static
    {
        $this->Competence_nom = $Competence_nom;

        return $this;
    }

    public function getCompetenceContenu(): ?string
    {
        return $this->Competence_contenu;
    }

    public function setCompetenceContenu(string $Competence_contenu): static
    {
        $this->Competence_contenu = $Competence_contenu;

        return $this;
    }
}
