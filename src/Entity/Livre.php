<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 13)]
    private $isbn;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer')]
    private $nombre_pages;

    #[ORM\Column(type: 'date')]
    private $date_de_parution;

    #[ORM\Column(type: 'integer')]
    private $note;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'livres')]
    private $Genres;

    #[ORM\ManyToMany(targetEntity: Auteur::class, inversedBy: 'livres')]
    private $Auteurs;

    public function __construct()
    {
        $this->Genres = new ArrayCollection();
        $this->Auteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }
    public function __toString()
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNombrePages(): ?int
    {
        return $this->nombre_pages;
    }

    public function setNombrePages(int $nombre_pages): self
    {
        $this->nombre_pages = $nombre_pages;

        return $this;
    }

    public function getDateDeParution(): ?\DateTimeInterface
    {
        return $this->date_de_parution;
    }

    public function setDateDeParution(\DateTimeInterface $date_de_parution): self
    {
        $this->date_de_parution = $date_de_parution;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->Genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->Genres->contains($genre)) {
            $this->Genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->Genres->removeElement($genre);

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteurs(): Collection
    {
        return $this->Auteurs;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->Auteurs->contains($auteur)) {
            $this->Auteurs[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        $this->Auteurs->removeElement($auteur);

        return $this;
    }
}
