<?php

namespace Carrinho\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class CarrinhoController extends AbstractActionController
{
    /**
     * Retorna uma instancia de ManipuladorCarrinho
     * @return Carrinho\Cache\ManipuladorCarrinho
     */
    private function getManipuladorCarrinho()
    {
        return $this->getServiceLocator()->get('Carrinho\Cache\ManipuladorCarrinho');
    }

    /**
     * Renderiza a tela de carrinho do cliente
     * @return ViewModel
     */
    public function mostraCarrinhoAction()
    {
        $manipuladorCarrinho = $this->getManipuladorCarrinho();
        $produtosCarrinho = $manipuladorCarrinho->getCarrinho();

        return (new ViewModel())
            ->setVariable('produtos', $produtosCarrinho);
    }

    /**
     * Adiciona o produto no carrinho
     * @return JsonModel
     */
    public function adicionaProdutoAction()
    {
        $produtoId = $this->params()->fromPost("produtoId", null);
        $quantidade = $this->params()->fromPost("quantidade", null);

        $manipuladorCarrinho = $this->getManipuladorCarrinho();
        $manipuladorCarrinho->adicionarProduto(
            $produtoId,
            $quantidade
        );

        return new JsonModel(
            ["message" => "Adicionado com sucesso"]
        );
    }

   /**
     * Remove o produto do carrinho
     * @return JsonModel
     */
    public function removeProdutoAction()
    {
        $produtoId = $this->params()->fromPost("produtoId", null);

        $manipuladorCarrinho = $this->getManipuladorCarrinho();
        $manipuladorCarrinho->removerProduto(
            $produtoId
        );

        return new JsonModel(
            ["message" => "Removido com sucesso"]
        );
    }
}
