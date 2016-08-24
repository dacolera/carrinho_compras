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
    public function MostraCarrinhoAction()
    {
        // Carrega do cache (redis?) os produtos adicionados
        $produtosCarrinho = array(
            'produtos' => array(
                "1" => array(
                    "nome" => "TV SAMSUNG",
                    "preco" => "1.500,00",
                    "imagem" => "<img>",
                    "quantidade" => "1",
                ),
                "2" => array(
                    "nome" => "TV SONY",
                    "preco" => "3.000,00",
                    "imagem" => "<img>",
                    "quantidade" => "2",
                )
            )
        );

    	return (new ViewModel())
            ->setVariable('produtosCarrinho', $produtosCarrinho);
    }

    /**
     * Adiciona o produto no carrinho
     * @return JsonModel
     */
    public function AdicionaProdutoAction()
    {
        // Adicionar o produto ao cache (redis?)
        return new JsonModel(
            $this->params()->fromPost()
        );
    }
}