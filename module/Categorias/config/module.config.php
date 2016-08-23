<?php

return array(
	'controllers' => array(
        'invokables' => array(
            'Categorias\Controller\Categorias' => 'Categorias\Controller\CategoriasController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'categorias' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/categorias/:categoriaId/produtos/',
	                'constraints' => array(
	                    'categoriaId'     => '[0-9]+',
	                ),                    
                    'defaults' => array(
                        'controller' => 'Categorias\Controller\Categorias',
                        'action'     => 'listaProdutosPorCategoria',
                    ),
                ),
            ),
        ),
    ),
);