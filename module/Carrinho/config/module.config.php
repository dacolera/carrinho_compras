<?php

return [
    'controllers' => [
        'invokables' => [
            'Carrinho\Controller\Carrinho' => 'Carrinho\Controller\CarrinhoController',
        ],
    ],

    'router' => [
        'routes' => [
            'carrinho' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/carrinho/',
                    'defaults' => [
                        'controller' => 'Carrinho\Controller\Carrinho',
                        'action'     => 'mostraCarrinho',
                    ],
                ],
            ],
            'adiciona-produto' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/carrinho/adicionar-produto/',
                    'defaults' => [
                        'controller' => 'Carrinho\Controller\Carrinho',
                        'action'     => 'adicionaProduto',
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
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
