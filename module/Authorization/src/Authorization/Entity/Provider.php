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

/**
 * @ORM\Entity
 * @ORM\Table(name="provider")
 */
class Provider
{

    const AVAILABLE = 'available';
    const AVAILABLE_NONE = 'unavailable';

    protected $availabilityDefault = [
        Provider::AVAILABLE,
        Provider::AVAILABLE_NONE
    ];
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
        if(!in_array($vehicle, $this->availabilityDefault)) {
            return new InvalidArgumentException('vehicle is not valid');
        }

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
        if(!in_array($availability, $this->availabilityDefault)) {
            return new InvalidArgumentException('availability is not valid');
        }

        $this->availability = $availability;

        return $this;
    }



}