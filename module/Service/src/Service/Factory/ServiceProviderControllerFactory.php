<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 17.10.15
 * Time: 21:53
 */

namespace Service\Factory;

use Service\Controller\ServiceProviderController;
use Service\Service\ServiceService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceProviderControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();

        return new ServiceProviderController(
          $serviceLocator->get(ServiceService::class)
        );
    }
}