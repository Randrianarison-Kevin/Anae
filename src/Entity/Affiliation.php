<?php

namespace App\Entity;

use App\Repository\AffiliationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffiliationRepository::class)]
class Affiliation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Affiliation_nom = null;

    public function getAffiliationId(): ?int
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
}
