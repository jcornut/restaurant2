<?php

namespace RestaurantBundle\Entity;

/**
 * PlatType
 */
class PlatType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \RestaurantBundle\Entity\Plat
     */
    private $type;


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
     *
     * @return PlatType
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
     * Set type
     *
     * @param \RestaurantBundle\Entity\Plat $type
     *
     * @return PlatType
     */
    public function setType(\RestaurantBundle\Entity\Plat $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \RestaurantBundle\Entity\Plat
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $plats;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plats = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add plat
     *
     * @param \RestaurantBundle\Entity\Plat $plat
     *
     * @return PlatType
     */
    public function addPlat(\RestaurantBundle\Entity\Plat $plat)
    {
        $this->plats[] = $plat;

        return $this;
    }

    /**
     * Remove plat
     *
     * @param \RestaurantBundle\Entity\Plat $plat
     */
    public function removePlat(\RestaurantBundle\Entity\Plat $plat)
    {
        $this->plats->removeElement($plat);
    }

    /**
     * Get plats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlats()
    {
        return $this->plats;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $types;


    /**
     * Add type
     *
     * @param \RestaurantBundle\Entity\Plat $type
     *
     * @return PlatType
     */
    public function addType(\RestaurantBundle\Entity\Plat $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \RestaurantBundle\Entity\Plat $type
     */
    public function removeType(\RestaurantBundle\Entity\Plat $type)
    {
        $this->types->removeElement($type);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypes()
    {
        return $this->types;
    }
}
