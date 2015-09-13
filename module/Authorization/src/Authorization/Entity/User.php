<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 13.09.15
 * Time: 17:14
 */
namespace Authorization\Entity;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $fullName;

    /**
     * Get Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set name
     *
     * @param $fullName
     * @return $this
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

}
