<?php

namespace CustomCollection;

use Zend\Router\Http\Segment;

return array(
    'router' => array(
        'routes' => array(
            'custom-collect' => array(
                'type'    => Segment::class,
                'options' => array(
                    'route'    => '/custom-collect[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\CustomCollectionController::class,
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'custom_collect' => __DIR__ . '/../view',
        ),
    ),

);