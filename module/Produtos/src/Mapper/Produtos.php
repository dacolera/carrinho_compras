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
}