<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_ville = null;

    #[ORM\Column(length: 30)]
    private ?string $nom_ville = null;

    #[ORM\Column(length: 50)]
    private ?string $img_ville = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $desc_ville = null;
    
    #[ORM\ManyToOne(inversedBy: 'villes')]
    #[ORM\JoinColumn(name: 'id_pays', referencedColumnName: 'id_pays')]
    private ?Pays $pays = null;

    #[ORM\OneToMany(mappedBy: 'ville', targetEntity: Monument::class)]
    private Collection $monuments;
    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): static
    {
        $this->pays = $pays;

        return $this;
    }
    
    /**
     * @return Collection<int, Monument>
     */
    public function getMonuments(): Collection
    {
        return $this->monuments;
    }

    

    public function getIdVille(): ?int
    {
        return $this->id_ville;
    }

    public function getNomVille(): ?string
    {
        return $this->nom_ville;
    }

    public function setNomVille(string $nom_ville): static
    {
        $this->nom_ville = $nom_ville;

        return $this;
    }

    public function getImgVille(): ?string
    {
        return $this->img_ville;
    }

    public function setImgVille(string $img_ville): static
    {
        $this->img_ville = $img_ville;

        return $this;
    }

    public function getDescVille(): ?string
    {
        return $this->desc_ville;
    }

    public function setDescVille(string $desc_ville): static
    {
        $this->desc_ville = $desc_ville;

        return $this;
    }
}