<?php

return [
    'controllers' => [
        'invokables' => [
            'Categorias\Controller\Categorias' => 'Categorias\Controller\CategoriasController',
        ],
    ],

    'router' => [
        'routes' => [
            'categorias' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/categorias/:categoriaId/produtos/',
                    'constraints' => [
                        'categoriaId'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Categorias\Controller\Categorias',
                        'action'     => 'listaProdutosPorCategoria',
                    ],
                ],
            ],
        ],
    ],
];
