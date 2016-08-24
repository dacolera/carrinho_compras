<?php

namespace Produtos\Mapper;

use Zend\Db\Adapter\Adapter;

/**
 * Mapper de Produtos
 */
class Produtos extends Adapter
{
	/**
	 * Retorna uma lista de produtos por categoria
	 * @param int $categoriaId
	 * @return array
	 */
	public function getProdutosPorCategorias($categoriaId)
	{
		$statement = $this->createStatement(
			'SELECT
			    p.*
			FROM
			    produto as p
			        INNER JOIN
			    produto_categoria as pc ON p.produto_id = pc.produto_id
			WHERE
			    pc.categoria_id = '. $categoriaId
		);

		$statement->prepare();
		$result = $statement->execute();

		return $result;
	}

	/**
	 * Retorna um produto pelo id
	 * @param int $produtoId
	 * @return array
	 */
	public function getProdutoPorId($produtoId)
	{
		$statement = $this->createStatement(
			'SELECT 
			    p.*
			FROM
			    produto AS p
			WHERE
			    p.produto_id = '. $produtoId
		);

		$statement->prepare();
		$result = $statement->execute();

		return $result;
	}

	/**
	 * Retorna uma lista de caracteristicas de produto
	 * @param int $produtoId
	 * @return array
	 */
	public function getCaracteristicasProdutoPorId($produtoId)
	{
		$statement = $this->createStatement(
			"SELECT 
			    pcc.caracteristica_id, c.descricao, pcc.informacao
			FROM
			    produto_caracteristica AS pcc
			        INNER JOIN
			    caracteristica AS c ON pcc.caracteristica_id = c.caracteristica_id
			WHERE
			    pcc.produto_id = " . $produtoId
		);

		$statement->prepare();
		$result = $statement->execute();

		return $result;
	}	
}