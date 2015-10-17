<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 17.10.15
 * Time: 22:02
 */

namespace Service\Factory;

use Service\Entity\Service;
use Doctrine\ORM\EntityManager;
use Service\Service\ServiceService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var EntityManager $entityManager */
        $entityManager  = $serviceLocator->get(EntityManager::class);

        return new ServiceService(
            $entityManager->getRepository(Service::class)
        );
    }
}