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
		return $this->produtosMapper->getProdutosPorCategorias($categoriaId);
	}
}