<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 23.09.15
 * Time: 23:18
 */

namespace Authorization\Entity;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Service\Entity\Service;

/**
 * @ORM\Entity
 * @ORM\Table(name="provider")
 */
class Provider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $fullName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $vehicle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $availability;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Service\Entity\Service", mappedBy="providers")
     */
    protected $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return $this
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return $this
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return $this
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return $this
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }


    /**
     * @param $vehicle
     * @return $this|InvalidArgumentException
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }


    /**
     * @param $availability
     * @return $this|InvalidArgumentException
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

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
        $service->getProviders()->add($this);

        return $this;
    }

    /**
     * @param Service $service
     * @return $this
     */
    public function removeService(Service $service)
    {
        $this->services->removeElement($service);
        $service->getProviders()->removeElement($this);

        return $this;
    }

}