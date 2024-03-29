<?php

namespace App\Entity;

use App\Repository\MultipleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MultipleRepository::class)]
class Multiple
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Choix::class, inversedBy: 'multiples')]
    private Collection $Choix;

    public function __construct()
    {
        $this->Choix = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Choix>
     */
    public function getChoix(): Collection
    {
        return $this->Choix;
    }

    public function addChoix(Choix $choix): static
    {
        if (!$this->Choix->contains($choix)) {
            $this->Choix->add($choix);
        }

        return $this;
    }

    public function removeChoix(Choix $choix): static
    {
        $this->Choix->removeElement($choix);

        return $this;
    }
}
