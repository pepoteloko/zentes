<?php

namespace Ajax;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'ajax' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/ajax',
                    'defaults' => [
                        'controller' => Controller\AjaxController::class,
                        'action'     => 'ajax',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AjaxController::class => InvokableFactory::class,
        ],
    ],
];
