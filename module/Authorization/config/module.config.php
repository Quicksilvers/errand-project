<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 13.09.15
 * Time: 17:06
 */

use Authorization\Factory;
use Authorization\Form;
return array(
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Authorization/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Authorization\Entity' => 'application_entities'
                )
            ))),
    'router' => array(
        'routes' => array(
            'auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        'controller' => 'Authorization\Controller\Authorize',
                        'action'     => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => [
                    'provider' => [
                        'type' => 'Literal',
                        'options' => [
                          'route' => '/provider',
                          'defaults' => [
                              'controller' => 'Authorization\Controller\Authorize',
                              'action'     => 'register'
                          ]
                        ]
                    ]
                ]
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Authorization\Controller\Authorize' => Factory\AuthorizeControllerFactory::class
        )
    ),
    'service_manager' => array(
        'invokables' => array(
            'Zend\Session\SessionManager' => 'Zend\Session\SessionManager',
        ),
        'factories' => [
            'Authorization\Service\AuthorizeService' => Factory\AuthorizeServiceFactory::class
        ]
    ),
    'form_elements' => [
        'invokables' => [
            'registerForm' => 'Authorization\Form\RegisterForm'
            ]
        ],
    'input_filters' => [
        'invokables' => [
            'RegisterFormInputFilter' => 'Authorization\InputFilter\RegisterFormInputFilter',
        ]
    ],
    'view_manager' => [
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ]
);