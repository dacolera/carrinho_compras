<?php

return [
    'controllers' => [
        'invokables' => [
            'Pedido\Controller\Pedido' => 'Pedido\Controller\PedidoController',
        ],
    ],

    'router' => [
        'routes' => [
            'dadosCliente' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/pedido/dados-cliente/',
                    'defaults' => [
                        'controller' => 'Pedido\Controller\Pedido',
                        'action'     => 'dadosCliente',
                    ],
                ],
            ],
            'finalizarPedido' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/pedido/finalizar/',
                    'defaults' => [
                        'controller' => 'Pedido\Controller\Pedido',
                        'action'     => 'finalizar',
                    ],
                ],                
            ],
        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],    
];
