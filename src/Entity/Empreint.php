<?php

namespace App\Entity;

use App\Repository\EmpreintRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpreintRepository::class)
 */
class Empreint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $idLivre;

    /**
     * @ORM\Column(type="date")
     */
    private $DateEmpreint;

    /**
     * @ORM\Column(type="date")
     */
    private $DateRetour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getIdLivre(): ?int
    {
        return $this->idLivre;
    }

    public function setIdLivre(int $idLivre): self
    {
        $this->idLivre = $idLivre;

        return $this;
    }

    public function getDateEmpreint(): ?\DateTimeInterface
    {
        return $this->DateEmpreint;
    }

    public function setDateEmpreint(\DateTimeInterface $DateEmpreint): self
    {
        $this->DateEmpreint = $DateEmpreint;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->DateRetour;
    }

    public function setDateRetour(\DateTimeInterface $DateRetour): self
    {
        $this->DateRetour = $DateRetour;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }



}
