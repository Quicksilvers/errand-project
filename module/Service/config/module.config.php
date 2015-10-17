<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.10.15
 * Time: 0:04
 */
use Service\Controller;
use Service\Factory;
return [
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Service/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Service\Entity' => 'application_entities'
                )
            ))),
    'router' => [
        'routes' => [
            'serviceProvider' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/service[/:service_id]',
                    'defaults' => [
                        'controller' => 'Service\ServiceProviderController'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            'Service\ServiceProviderController' => Factory\ServiceProviderControllerFactory::class,
        ]
    ],
    'service_manager' => [
        'factories' => [
            'Service\Service\ServiceService'    => Factory\ServiceServiceFactory::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'service' => __DIR__ . '/../view'
        ]
    ],
];