<?php

namespace Carrinho\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class CarrinhoController extends AbstractActionController
{
    /**
     * Renderiza a tela de carrinho do cliente
     * @return ViewModel
     */
    public function mostraCarrinhoAction()
    {
        // Carrega do cache (redis?) os produtos adicionados
        $produtosCarrinho = [
            'produtos' => [
                "1" => [
                    "nome" => "TV SAMSUNG",
                    "preco" => "1.500,00",
                    "imagem" => "<img>",
                    "quantidade" => "1",
                ],
                "2" => [
                    "nome" => "TV SONY",
                    "preco" => "3.000,00",
                    "imagem" => "<img>",
                    "quantidade" => "2",
                ]
            ]
        ];

        return (new ViewModel())
            ->setVariable('produtosCarrinho', $produtosCarrinho);
    }

    /**
     * Adiciona o produto no carrinho
     * @return JsonModel
     */
    public function adicionaProdutoAction()
    {
        // Adicionar o produto ao cache (redis?)
        return new JsonModel(
            $this->params()->fromPost()
        );
    }
}
