<?php

namespace Pedido\Service;

use Pedido\Mapper\Pedido as PedidoMapper;

/**
 * Classe de serviços da entidade Pedido
 */
class Pedido
{
    /**
     * Instancia de Pedido\Mapper\Pedido
     * @var Pedido\Mapper\Pedido
     */
    private $pedidoMapper;

    /**
     * @param PedidoMapper $pedidoMApper
     */
    public function __construct(PedidoMapper $pedidoMapper)
    {
        $this->pedidoMapper = $pedidoMapper;
    }

    public function finalizarPedido(
        array $dadosCliente,
        array $dadosEndereco,
        array $produtosCarrinho,
        $formaPagamentoId
    ){
        $clienteId = $this->pedidoMapper->insereCliente($dadosCliente);
        $enderecoId = $this->pedidoMapper->insereEndereco($dadosEndereco);
        $this->pedidoMapper->associaClienteEndereco($clienteId, $enderecoId);

        $valorTotal = 0;
        foreach ($produtosCarrinho as $produto) {
            $valorTotal+= $produto['preco'] * $produto['quantidade'];
        }

        $pedidoId = $this->pedidoMapper->inserePedido($clienteId, $enderecoId, $formaPagamentoId,  $valorTotal);

        foreach ($produtosCarrinho as $produto) {
            $this->pedidoMapper->insereProdutosPedido($pedidoId, $produto);
        }
        
        return $pedidoId;
    } 

}
