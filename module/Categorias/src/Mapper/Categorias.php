<?php

namespace Categorias\Mapper;

use Zend\Db\Adapter\Adapter;

/**
 * Mapper de Categorias
 */
class Categorias extends Adapter
{
	/**
	 * Retorna uma lista de categorias
	 * @return array
	 */
	public function getCategorias()
	{
		$statement = $this->createStatement('SELECT * FROM categoria');
		$statement->prepare();
		$result = $statement->execute();

		return $result;
	}
}