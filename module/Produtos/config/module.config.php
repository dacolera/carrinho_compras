<?php

return [
    'controllers' => [
        'invokables' => [
            'Produtos\Controller\Produtos' => 'Produtos\Controller\ProdutosController',
        ],
    ],

    'router' => [
        'routes' => [
            'listaProdutosPorCategoria' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/categoria/:categoriaId/produtos/',
                    'constraints' => [
                        'categoriaId'  => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Produtos\Controller\Produtos',
                        'action'     => 'listaProdutosPorCategoria',
                    ],
                ],
            ],
            'detalhaProduto' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/produto/:produtoId/',
                    'constraints' => [
                        'produtoId'  => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Produtos\Controller\Produtos',
                        'action'     => 'detalhaProduto',
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
