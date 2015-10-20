<?php

namespace Service\Service;

use Service\Entity\Location;

class LocationService
{
    /**
     * @var Location $locationEntity
     */
    protected $locationEntity;

    public function __construct($locationEntity)
    {
        $this->locationEntity = $locationEntity;
    }

    public function findAll()
    {
       return $this->locationEntity->findAll();

    }


}
