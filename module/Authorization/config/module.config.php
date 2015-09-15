<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 13.09.15
 * Time: 17:06
 */
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
                    'route' => '/auth',
                    'defaults' => array(
                        'controller' => 'Authorization\Controller\Authorize',
                        'action'     => 'index'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Authorization\Controller\Authorize' => 'Authorization\Controller\AuthorizeController'
        )
    ),
    'service_manager' => array(
        'invokables' => array(
            'Zend\Session\SessionManager' => 'Zend\Session\SessionManager',
        ),
    ),
);