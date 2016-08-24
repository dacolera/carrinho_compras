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

    /**
     * Retorna uma categoria pelo id
     * @param int $categoriaId
     * @return array
     */
    public function getCategoriaPorId($categoriaId)
    {
        $statement = $this->createStatement(
            'SELECT 
                c.*
            FROM
                categoria AS c
            WHERE
			    c.categoria_id = ' .$categoriaId
        );

        $statement->prepare();
        $result = $statement->execute();

        return $result;
    }
}
