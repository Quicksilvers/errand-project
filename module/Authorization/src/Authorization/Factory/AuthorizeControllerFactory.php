<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 24.09.15
 * Time: 23:24
 */
namespace Authorization\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Authorization\Controller\AuthorizeController;
use Authorization\Form\RegisterForm;
use Authorization\Service\AuthorizeService;

class AuthorizeControllerFactory implements FactoryInterface
{
    /**
     * produces a class authorize controller class with given instances injected
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return AuthorizeController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();
        $filterManager = $serviceLocator->get('InputFilterManager');

        return new AuthorizeController(
            $serviceLocator->get('FormElementManager')->get('registerForm'),
            $serviceLocator->get(AuthorizeService::class),
            $filterManager->get('RegisterFormInputFilter')
        );
    }
}