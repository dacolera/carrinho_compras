<?php

namespace Categorias\Service;

use Categorias\Mapper\Categorias as CategoriasMapper;

/**
 * Classe de serviços da entidade Categorias
 */
class Categorias
{
    /**
     * Instancia de Categorias\Mapper\Categorias
     * @var Categorias\Mapper\Categorias
     */
    private $categoriasMapper;

    /**
     * @param CategoriasMapper $categoriasMApper
     */
    public function __construct(CategoriasMapper $categoriasMapper)
    {
        $this->categoriasMapper = $categoriasMapper;
    }

    /**
     * Retorna uma lista de categorias
     * @return array
     */
    public function getCategorias()
    {
        return $this->categoriasMapper->getCategorias();
    }

    /**
     * Retorna uma categoria pelo Id
     * @param int $categoriaId
     * @return array
     */
    public function getCategoriaPorId($categoriaId)
    {
        $categoria = $this->categoriasMapper->getCategoriaPorId($categoriaId);

        if (! $categoria->count()) {
            throw new \Exception('Não existe a categoria!');
        }
        return $categoria->current();
    }
}
