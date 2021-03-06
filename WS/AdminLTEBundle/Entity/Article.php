<?php

namespace WS\AdminLTEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WS\AdminLTEBundle\Entity\ArticleRepository")
 * @UniqueEntity(fields="title", message="Une annonce existe déjà avec ce titre.")
 */
class Article
{
    /**
     * @ORM\ManyToOne(targetEntity="WS\AdminLTEBundle\Entity\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank(message="Il faut renseigner un titre")
     *
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128,unique=true)
     */
    private $slug;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\Date()
     */
    private $date;


    /**
     * @var text
     *
     * @ORM\Column(name="ingredients", type="text",nullable=true)
     */
    private $ingredients;

    /**
     * @var text
     *
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;
  

    /**
     * @var integer
     *
     * @ORM\Column(name="preparation", type="integer", length=255,nullable=true)
     */
    private $preparation;

    /**
     * @ORM\OneToOne(targetEntity="WS\AdminLTEBundle\Entity\Image", cascade={"persist","remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="WS\AdminLTEBundle\Entity\Image", cascade={"persist","remove"})
     * @Assert\Valid()
     */
    private $thumbmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;


    public function __construct()
    {
        $this->date = new \Datetime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set preparation
     *
     * @param string $preparation
     * @return Article
     */
    public function setPreparation($preparation)
    {
        $this->preparation = $preparation;

        return $this;
    }

    /**
     * Get preparation
     *
     * @return string 
     */
    public function getPreparation()
    {
        return $this->preparation;
    }


    /**
     * Set image
     *
     * @param \WS\AdminLTEBundle\Entity\Image $image
     * @return Article
     */
    public function setImage(\WS\AdminLTEBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \WS\AdminLTEBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set categorie
     *
     * @param \WS\AdminLTEBUndle\Entity\Categorie $categorie
     * @return Article
     */
    public function setCategorie(\WS\AdminLTEBUndle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \WS\AdminLTEBUndle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set ingredients
     *
     * @param \DateTime $ingredients
     * @return Article
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get ingredients
     *
     * @return \DateTime 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set thumbmail
     *
     * @param \WS\AdminLTEBundle\Entity\Image $thumbmail
     * @return Article
     */
    public function setThumbmail(\WS\AdminLTEBundle\Entity\Image$thumbmail = null)
    {
        $this->thumbmail = $thumbmail;

        return $this;
    }

    /**
     * Get thumbmail
     *
     * @return \WS\AdminLTEBundle\Entity\Image
     */
    public function getThumbmail()
    {
        return $this->thumbmail;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     * @return Article
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
