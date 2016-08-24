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

);