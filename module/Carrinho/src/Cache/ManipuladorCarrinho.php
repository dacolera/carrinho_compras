<?php

namespace Carrinho\Cache;

use Zend\Session\Container;
use Produtos\Service\Produtos;

/**
* Manipula os dados do carrinho
*/
class ManipuladorCarrinho
{
    const CARRINHO = "carrinho";

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Adiciona produtos no carrinho. Se ja existir, altera a quantidade
     * @param  int $produtoId  Id do produto
     * @param  int $quantidade Quantidade escolhida
     * @return booelan
     */
    public function adicionarProduto($produtoId, $quantidade)
    {
        $carrinho = $this->container->offSetGet(self::CARRINHO);
        $carrinho[$produtoId] = $quantidade;

        $this->container->offSetSet(
            self::CARRINHO,
            $carrinho
        );

        return true;
    }

    /**
     * Remove um produto do carrinho
     * @param  int $produtoId
     * @return booelan
     */
    public function removerProduto($produtoId)
    {
        $carrinho = $this->container->offSetGet(self::CARRINHO);
        unset($carrinho[$produtoId]);

        $this->container->offSetSet(
            self::CARRINHO,
            $carrinho
        );

        return true;
    }

    /**
     * Retorna os produtos do carrinho com os detalhes e quantidade
     * @param Produtos\Service\Produtos $produtoService
     * @return array
     */
    public function getCarrinho(Produtos $produtoService)
    {
        $carrinhoProdutos = $this->container->offSetGet(self::CARRINHO);
        $carrinhoProdutos = ! empty($carrinhoProdutos) ? $carrinhoProdutos : [];

        foreach ($carrinhoProdutos as $produtoId => $quantidade) {
            $carrinhoProdutos[$produtoId] = $produtoService->getProdutoPorId($produtoId);
            $carrinhoProdutos[$produtoId]['quantidade'] = $quantidade;
        }

        return $carrinhoProdutos;
    }
}
