<?php

namespace Pedido\Mapper;

use Zend\Db\Adapter\Adapter;

/**
 * Mapper de Pedido
 */
class Pedido extends Adapter
{

    public function insereCliente(array $dados)
    {
        $statement = $this->createStatement(
            sprintf(
                'INSERT INTO cliente 
                    (nome, cpf, data_nascimento, email, telefone) 
                VALUES 
                    ("%s", "%s", "%s", "%s", "%s")',
                $dados['nome'],
                $dados['cpf'],
                $dados['data_nascimento'],
                $dados['email'],
                $dados['telefone']
            )
        );

        $result = $statement->execute();
        return $result->getGeneratedValue();
    }

    public function insereEndereco(array $dados)
    {
        $statement = $this->createStatement(
            sprintf(
                'INSERT INTO endereco 
                    (logradouro, numero, complemento, cep, bairro, cidade, estado) 
                VALUES 
                    ("%s", "%s", "%s", "%s", "%s", "%s", "%s")',
                $dados['logradouro'],
                $dados['numero'],
                $dados['complemento'],
                $dados['cep'],
                $dados['bairro'],
                $dados['cidade'],
                $dados['estado']
            )
        );

        $result = $statement->execute();
        return $result->getGeneratedValue();
    }

    public function associaClienteEndereco($clienteId, $enderecoId)
    {
        $statement = $this->createStatement(
            sprintf(
                'INSERT INTO endereco_cliente (
                    endereco_id, cliente_id) 
                VALUES 
                    ("%s", "%s")',
                $enderecoId,
                $clienteId
            )
        );

        $result = $statement->execute();
    }

    public function inserePedido($clienteId, $enderecoId, $formaPagamentoId, $total)
    {
        $statement = $this->createStatement(
            sprintf(
                'INSERT INTO pedido (
                    cliente_id, endereco_id, forma_pagamento_id, valor_total) 
                VALUES 
                    ("%s", "%s", "%s", "%s")',
                $clienteId,
                $enderecoId,
                $formaPagamentoId,
                $total
            )
        );

        $result = $statement->execute();
        return $result->getGeneratedValue();
    }    

    public function insereProdutosPedido($pedidoId, $dados)
    {
        $statement = $this->createStatement(
            sprintf(
                'INSERT INTO pedido_produto 
                    (pedido_id, produto_id, quantidade, valor_unitario, valor_total) 
                VALUES 
                    ("%s", "%s", "%s", "%s", "%s")',
                $pedidoId,
                $dados['produto_id'],
                $dados['quantidade'],
                $dados['preco'],
                $dados['preco'] * $dados['quantidade']
            )
        );

        $result = $statement->execute();        
    }
  
}
