<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.10.15
 * Time: 19:03
 */

namespace Service\Entity;

use Application\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Authorization\Entity\Provider;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\View\Exception\InvalidArgumentException;

/**
 * Description of service entity
 *
 * @ORM\Entity
 * @ORM\Table(name="service")
 */
class Service extends AbstractEntity
{
    const EXP_BEGINNER     = 'amateur';
    const EXP_PROFESSIONAL = "professional";
    const EXP_WORLD        = "world class";
    const EXP_GURU         = "guru";

    /**
     * Possible variants for experience field
     *
     * @var array
     */
    protected $experience = [
        Service::EXP_BEGINNER,
        Service::EXP_PROFESSIONAL,
        Service::EXP_WORLD,
        Service::EXP_GURU
    ];
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="Service\Entity\Category", inversedBy="services")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $category;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Authorization\Entity\Provider", inversedBy="services")
     * @ORM\JoinTable(name="providers_services",
     *  joinColumns={
            @ORM\JoinColumn(name="service_id", referencedColumnName="id", onDelete="cascade")
     *   },
     *  inverseJoinColumns={
            @ORM\JoinColumn(name="provider_id", referencedColumnName="id", onDelete="cascade")
     *  }
     * )
     */
    protected $providers;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    protected $serviceFee;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $location;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $minMiles;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $maxMiles;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $expLevel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $description;

    public function __construct()
    {
        $this->providers = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getProviders()
    {
        return $this->providers;
    }

    /**
     * @param Provider $provider
     * @return $this
     */
    public function addProvider(Provider $provider)
    {
        $this->providers->add($provider);
        $provider->getServices()->add($this);

        return $this;
    }

    /**
     * @param Provider $provider
     * @return $this
     */
    public function removeProvider(Provider $provider)
    {
        $this->providers->removeElement($provider);
        $provider->getServices()->removeElement($this);

        return $this;
    }

    /**
     * @return float
     */
    public function getServiceFee()
    {
        return $this->serviceFee;
    }

    /**
     * @param float $serviceFee
     * @return $this
     */
    public function setServiceFee($serviceFee)
    {
        $this->serviceFee = $serviceFee;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinMiles()
    {
        return $this->minMiles;
    }

    /**
     * @param int $minMiles
     * @return $this
     */
    public function setMinMiles($minMiles)
    {
        $this->minMiles = $minMiles;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxMiles()
    {
        return $this->maxMiles;
    }

    /**
     * @param int $maxMiles
     * @return $this
     */
    public function setMaxMiles($maxMiles)
    {
        $this->maxMiles = $maxMiles;

        return $this;
    }


    /**
     * @return string
     */
    public function getExpLevel()
    {
        return $this->expLevel;
    }

    /**
     * @param $level
     * @return $this|InvalidArgumentException
     */
    public function setExpLevel($level)
    {
        if(!in_array($level, $this->expLevel)) {
            return new InvalidArgumentException("experience level in not valid");
        }

        $this->expLevel = $level;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


}