<?php

return array(
	'controllers' => array(
        'invokables' => array(
            'Carrinho\Controller\Carrinho' => 'Carrinho\Controller\CarrinhoController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'carrinho' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/carrinho/',
                    'defaults' => array(
                        'controller' => 'Carrinho\Controller\Carrinho',
                        'action'     => 'MostraCarrinho',
                    ),
                ),
            ),
            'adiciona-produto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/carrinho/adicionar-produto/',
                    'defaults' => array(
                        'controller' => 'Carrinho\Controller\Carrinho',
                        'action'     => 'AdicionaProduto',
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
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],    
);