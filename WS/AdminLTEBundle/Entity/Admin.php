<?php
namespace WS\AdminLTEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="WS\AdminLTEBundle\Entity\AdminRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Admin
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;

  /**
   * @ORM\Column(name="description", type="text", nullable=true)
   */
  private $description;

  /**
     * @ORM\OneToOne(targetEntity="WS\AdminLTEBundle\Entity\Image", cascade={"persist","remove"})
     */
  private $photo;


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
     * Set name
     *
     * @param string $name
     * @return Admin
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Admin
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
     * Set photo
     *
     * @param \WS\AdminLTEBundle\Entity\Image $photo
     * @return Admin
     */
    public function setPhoto(\WS\AdminLTEBundle\Entity\Image $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return \WS\AdminLTEBundle\Entity\Image 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}
