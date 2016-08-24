<?php

namespace Produtos\Service;

use Produtos\Mapper\Produtos as ProdutosMapper;

/**
 * Classe de serviços da entidade Produtos
 */
class Produtos
{
    /**
     * Instancia de Produtos\Mapper\Produtos
     * @var Produtos\Mapper\Produtos
     */
    private $produtosMapper;

    /**
     * @param ProdutosMapper $produtosMApper
     */
    public function __construct(ProdutosMapper $produtosMapper)
    {
        $this->produtosMapper = $produtosMapper;
    }

    /**
     * Retorna uma lista de produtos por categorias
     * @param int $categoriaId
     * @return array
     */
    public function getProdutosPorCategorias($categoriaId)
    {
        $produtos = $this->produtosMapper->getProdutosPorCategorias($categoriaId);

        if (! $produtos->count()) {
            throw new \Exception('Não existem produtos para esta categoria!');
        }
        return $produtos;
    }

    /**
     * Retorna um produto por id
     * @param int $produtoId
     * @return array
     */
    public function getProdutoPorId($produtoId)
    {
        $produto = $this->produtosMapper->getProdutoPorId($produtoId);

        if (! $produto->count()) {
            throw new \Exception('Não existe o produto!');
        }
        return $produto->current();
    }

    /**
     * Retorna uma lista de caracteristicas de produto
     * @param int $produtoId
     * @return array
     */
    public function getCaracteristicasProdutoPorId($produtoId)
    {
        return $this->produtosMapper->getCaracteristicasProdutoPorId($produtoId);
    }
}
