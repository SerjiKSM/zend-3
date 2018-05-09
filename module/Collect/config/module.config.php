<?php

namespace Collect;

use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

use Collect\Controller\CollectController;

return array(
    'router' => array(
        'routes' => array(
            'collect' => array(
                'type'    => Segment::class,
                'options' => array(
                    'route'    => '/collect[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
//                        'controller' => Controller\CollectController::class,
                        'controller' => CollectController::class,
                        'action'     => 'index',
                    ),
                ),
            ),

            'collection' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/collection[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => [
//                        'controller' => Controller\IndexController::class,
                        'controller' => 'Collect\Controller\IndexController',
                        'action'     => 'index',
                    ],
                ],
            ],

            'products' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/products[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => [
                        'controller' => 'Product\Controller\IndexController',
                        'action'     => 'index',
                    ],
                ],
            ],

        ),
    ),

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                Controller\Factory\IndexControllerFactory::class,
        ],
    ],

    'view_manager' => array(
        'template_path_stack' => array(
            'collect' => __DIR__ . '/../view',
        ),
    ),

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ],

        /**
         * Generating proxies on runtime and using array cache instead of apc(u)
         * greatly reduces the performance. So, you may want to override
         * this settings on production environment.
         */
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'hydration_cache' => 'array',
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
            ),
        ),

    ]

);