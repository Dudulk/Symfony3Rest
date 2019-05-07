<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Structure
 *
 * @ORM\Table(name="structure")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StructureRepository")
 *
 */
class Structure
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=200)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100)
     */
    private $ville;

    /**
     * @var bool
     *
     * @ORM\Column(name="estasso", type="boolean")
     */
    private $estasso;

    /**
     * @var ArrayCollection Secteur $secteurs
     * Owning Side
     *
     * @ORM\ManyToMany(targetEntity="Secteur", inversedBy="structures")
     * @ORM\JoinTable(name="secteurs_structures",
     *   joinColumns={@ORM\JoinColumn(name="id_structure", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="id_secteur", referencedColumnName="id")}
     * )
     */
    private $secteurs;

    public function __construct()
    {
        $this->secteurs = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Structure
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Structure
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Structure
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Structure
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set estasso
     *
     * @param boolean $estasso
     *
     * @return Structure
     */
    public function setEstasso($estasso)
    {
        $this->estasso = $estasso;

        return $this;
    }

    /**
     * Get estasso
     *
     * @return bool
     */
    public function getEstasso()
    {
        return $this->estasso;
    }

    /**
     * @return ArrayCollection
     */
    public function getSecteurs()
    {
        return $this->secteurs;
    }

    /**
     * @param ArrayCollection $secteurs
     */
    public function setSecteurs($secteurs)
    {
        $this->secteurs = $secteurs;
    }
}

