<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 17.10.15
 * Time: 22:00
 */

namespace Service\Service;
use Service\Entity\Service;

class ServiceService
{
    /** @var Service $serviceEntity */
    protected $serviceEntity;

    public function __construct($serviceEntity)
    {
        $this->serviceEntity = $serviceEntity;
    }

    public function findAll()
    {
        return $this->serviceEntity->findAll();
    }
}