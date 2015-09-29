<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 25.09.15
 * Time: 1:13
 */
namespace Authorization\Factory;

use Authorization\Service\AuthorizeService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Authorization\Entity\Provider;

class AuthorizeServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
//        $serviceLocator = $serviceLocator->getServiceLocator();
        //Get a doctrine entity manager instance
        $em = $serviceLocator->get('doctrine.entitymanager.orm_default');

        return new AuthorizeService(
            $em->getRepository(Provider::class)
        );
    }
}

