<?php

namespace Carrinho\Cache;

use Zend\Session\Container;

/**
* Manipula os dados do carrinho
*/
class ManipuladorCarrinho
{
    const CARRINHO = "carrinho";
    const PRODUTOS_DETALHADOS = "produtosDetalhados";

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
     * @return array
     */
    public function getCarrinho()
    {
        $carrinhoProdutos = $this->container->offSetGet(self::CARRINHO);
        $produtosDetalhados = $this->container->offSetGet(self::PRODUTOS_DETALHADOS);

        foreach ($produtosDetalhados as $produtoId => $produto) {
            if (! array_key_exists($produtoId, $carrinhoProdutos)) {
                unset($produtosDetalhados[$produtoId]);

                $this->container->offSetSet(
                    self::PRODUTOS_DETALHADOS,
                    $produtosDetalhados
                );
                continue;
            }
            $produtosDetalhados[$produtoId]["quantidade"] = $carrinhoProdutos[$produtoId];
        }

        ksort($produtosDetalhados);
        return $produtosDetalhados;
    }

    /**
     * Guarda os dados do produto detalhado
     * @param  int $produtoId
     * @param  array  $produto Dados do produto
     * @return boolean
     */
    public function guardaProdutoDetalhado($produtoId, array $produto)
    {
        $produtosDetalhados = $this->container->offSetGet(self::PRODUTOS_DETALHADOS);
        $produtosDetalhados[$produtoId] = $produto;

        $this->container->offSetSet(
            self::PRODUTOS_DETALHADOS,
            $produtosDetalhados
        );

        return true;
    }
}
