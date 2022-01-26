<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 * @Vich\Uploadable
 */

class Livre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;
    
  

    /**
     * @ORM\Column(type="string")
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $qteStock;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEdition;

    /**
     * @ORM\ManyToOne(targetEntity=Editeur::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editeur;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="yes")
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity=Auteur::class, inversedBy="yes")
     */
    private $auteurs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;


    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQteStock(): ?int
    {
        return $this->qteStock;
    }

    public function setQteStock(int $qteStock): self
    {
        $this->qteStock = $qteStock;

        return $this;
    }

    public function getDateEdition(): ?\DateTimeInterface
    {
        return $this->dateEdition;
    }

    public function setDateEdition(\DateTimeInterface $dateEdition): self
    {
        $this->dateEdition = $dateEdition;

        return $this;
    }

    public function getEditeur(): ?Editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeur $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        $this->auteurs->removeElement($auteur);

        return $this;
    }
    public function __toString():string {
        return $this->titre;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function setImageFile( $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

}
