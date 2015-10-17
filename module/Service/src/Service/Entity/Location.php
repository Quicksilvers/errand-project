<?php

namespace Service\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\AbstractEntity;

/**
 * Description of a location entity
 *
 * @ORM\Entity
 * @ORM\Table(name="location")
 */
class Location extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=255)
    */
    protected $name;

    /**
     * @ORM\Column(type="integer")
    */
    protected $location_type;

    /**
     * @ORM\Column(type="integer")
    */
    protected $parent_id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
    */
    protected $is_visible;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     *
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation_type()
    {
        return $this->location_type;
    }

    /**
     * @param $location_type
     * @return $this
     */
    public function setLocation_type($location_type)
    {
        $this->location_type = $location_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent_id()
    {
        return $this->parent_id;
    }

    /**
     * @param $parent_id
     * @return $this
     */
    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIs_visible()
    {
        return $this->is_visible;
    }

    /**
     * @param $is_visible
     * @return $this
     */
    public function setIs_visible($is_visible)
    {
        $this->is_visible = $is_visible;

        return $this;
    }

}

