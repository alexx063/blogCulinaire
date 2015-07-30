<?php

namespace WS\AdminLTEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TopRecette
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WS\AdminLTEBundle\Entity\TopRecetteRepository")
 */
class TopRecette
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="WS\AdminLTEBundle\Entity\Article", cascade={"persist","remove"})
     */
    private $top1;

    /**
     * @ORM\OneToOne(targetEntity="WS\AdminLTEBundle\Entity\Article", cascade={"persist","remove"})
     */
    private $top2;

    /**
     * @ORM\OneToOne(targetEntity="WS\AdminLTEBundle\Entity\Article", cascade={"persist","remove"})
     */
    private $top3;

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
     * Set top1
     *
     * @param \WS\AdminLTEBundle\Entity\Article $top1
     * @return TopRecette
     */
    public function setTop1(\WS\AdminLTEBundle\Entity\Article $top1 = null)
    {
        $this->top1 = $top1;

        return $this;
    }

    /**
     * Get top1
     *
     * @return \WS\AdminLTEBundle\Entity\Article 
     */
    public function getTop1()
    {
        return $this->top1;
    }

    /**
     * Set top2
     *
     * @param \WS\AdminLTEBundle\Entity\Article $top2
     * @return TopRecette
     */
    public function setTop2(\WS\AdminLTEBundle\Entity\Article $top2 = null)
    {
        $this->top2 = $top2;

        return $this;
    }

    /**
     * Get top2
     *
     * @return \WS\AdminLTEBundle\Entity\Article 
     */
    public function getTop2()
    {
        return $this->top2;
    }

    /**
     * Set top3
     *
     * @param \WS\AdminLTEBundle\Entity\Article $top3
     * @return TopRecette
     */
    public function setTop3(\WS\AdminLTEBundle\Entity\Article $top3 = null)
    {
        $this->top3 = $top3;

        return $this;
    }

    /**
     * Get top3
     *
     * @return \WS\AdminLTEBundle\Entity\Article 
     */
    public function getTop3()
    {
        return $this->top3;
    }
}
