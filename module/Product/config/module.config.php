<?php

namespace Product;

use Zend\Router\Http\Segment;

return array(
    'router' => array(
        'routes' => array(
            'product' => array(
                'type'    => Segment::class,
                'options' => array(
                    'route'    => '/product[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\ProductController::class,
//                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ),
                ),
            ),
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
            'product' => __DIR__ . '/../view',
        ),
    ),
);