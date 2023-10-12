<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Contact_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Contact_email = null;

    #[ORM\Column(length: 255)]
    private ?string $Contact_sujet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Contact_message = null;

    public function getContactId(): ?int
    {
        return $this->id;
    }

    public function getContactNom(): ?string
    {
        return $this->Contact_nom;
    }

    public function setContactNom(string $Contact_nom): static
    {
        $this->Contact_nom = $Contact_nom;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->Contact_email;
    }

    public function setContactEmail(string $Contact_email): static
    {
        $this->Contact_email = $Contact_email;

        return $this;
    }

    public function getContactSujet(): ?string
    {
        return $this->Contact_sujet;
    }

    public function setContactSujet(string $Contact_sujet): static
    {
        $this->Contact_sujet = $Contact_sujet;

        return $this;
    }

    public function getContactMessage(): ?string
    {
        return $this->Contact_message;
    }

    public function setContactMessage(string $Contact_message): static
    {
        $this->Contact_message = $Contact_message;

        return $this;
    }
}
