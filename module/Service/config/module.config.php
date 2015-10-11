<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.10.15
 * Time: 0:04
 */
use Service\Controller;
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
        'invokables' => [
            'Service\ServiceProviderController' => Controller\ServiceProviderController::class
        ]
    ]
];