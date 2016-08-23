<?php

return array(
	'controllers' => array(
        'invokables' => array(
            'Produtos\Controller\Produtos' => 'Produtos\Controller\ProdutosController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'listaProdutosPorCategoria' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/categoria/:categoriaId/produtos/',
	                'constraints' => array(
	                    'categoriaId'  => '[0-9]+',
	                ),                    
                    'defaults' => array(
                        'controller' => 'Produtos\Controller\Produtos',
                        'action'     => 'listaProdutosPorCategoria',
                    ),
                ),
            ),
            'detalhaProduto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/produto/:produtoId/',
                    'constraints' => array(
                        'produtoId'  => '[0-9]+',
                    ),                    
                    'defaults' => array(
                        'controller' => 'Produtos\Controller\Produtos',
                        'action'     => 'detalhaProduto',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

);