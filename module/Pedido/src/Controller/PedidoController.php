<?php

namespace Pedido\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PedidoController extends AbstractActionController
{
    /**
     * Renderiza a tela de dados do cliente para o pedido
     * @return ViewModel
     */
    public function dadosClienteAction()
    {
        return new ViewModel();
    }

    /**
     * Renderiza a tela de dados do cliente para o pedido
     * @return ViewModel
     */
    public function finalizarAction()
    {
        $dadosCliente = $this->params()->fromPost("cliente");
        $dadosEndereco = $this->params()->fromPost("endereco");
        $formaPagamentoId = $this->params()->fromPost("forma_pagamento_id");

        $manipuladorCarrinho = $this->getServiceLocator()->get("Carrinho\Cache\ManipuladorCarrinho");
        $produtosCarrinho = $manipuladorCarrinho->getCarrinho(
            $this->getServiceLocator()->get('Produtos\Service\Produtos')
        );

        $pedidoService = $this->getServiceLocator()->get("Pedido\Service\Pedido");

        $pedidoId = $pedidoService->finalizarPedido(
            $dadosCliente,
            $dadosEndereco,
            $produtosCarrinho,
            $formaPagamentoId
        );

        $manipuladorCarrinho->removerProdutosDoCarrinho();

        return (new ViewModel())
            ->setVariable('pedidoId', $pedidoId);
    }
}
