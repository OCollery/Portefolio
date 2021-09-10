<?php

namespace App\Entity;

use App\Repository\SiteDeveloppeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteDeveloppeRepository::class)
 */
class SiteDeveloppe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;


    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nomRaccourci;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienSite;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $anneeConception;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $imageOuverture;

    /**
     * @ORM\Column(type="text", length=50)
     */
    private $detailProjet;


    /********************/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLienSite(): ?string
    {
        return $this->lienSite;
    }

    public function setLienSite(string $lienSite): self
    {
        $this->lienSite = $lienSite;

        return $this;
    }

    public function getAnneeConception(): ?string
    {
        return $this->anneeConception;
    }

    public function setAnneeConception(string $anneeConception): self
    {
        $this->anneeConception = $anneeConception;

        return $this;
    }

    public function getImageOuverture(): ?string
    {
        return $this->imageOuverture;
    }

    public function setImageOuverture(string $imageOuverture): self
    {
        $this->imageOuverture = $imageOuverture;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetailProjet()
    {
        return $this->detailProjet;
    }

    /**
     * @param mixed $detailProjet
     */
    public function setDetailProjet($detailProjet): void
    {
        $this->detailProjet = $detailProjet;
    }

    /**
     * @return mixed
     */
    public function getNomRaccourci()
    {
        return $this->nomRaccourci;
    }

    /**
     * @param mixed $nomRaccourci
     */
    public function setNomRaccourci($nomRaccourci): void
    {
        $this->nomRaccourci = $nomRaccourci;
    }

}
