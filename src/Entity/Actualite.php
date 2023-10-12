<?php

namespace App\Entity;

use App\Model\TimestampedInterface;
use App\Repository\ActualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActualiteRepository::class)]
class Actualite implements TimestampedInterface
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

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'Actualites', targetEntity: Media::class)]
    private Collection $media;


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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

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
            // set the owning side to null (unless already changed)
            if ($medium->getActualites() === $this) {
                $medium->setActualites(null);
            }
        }

        return $this;
    }
}
