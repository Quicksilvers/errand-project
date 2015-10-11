<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.10.15
 * Time: 13:05
 */

namespace Service\Entity;

use Application\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Description of a category entity
 *
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Service", mappedBy="category")
     */
    protected $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param Service $service
     * @return $this
     */
    public function addService(Service $service)
    {
        $this->services->add($service);

        return $this;
    }

    /**
     * @param Service $service
     * @return $this
     */
    public function removeService(Service $service)
    {
        $this->services->remove($service);

        return $this;
    }
}