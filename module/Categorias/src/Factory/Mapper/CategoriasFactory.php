<?php

namespace Categorias\Factory\Mapper;

use Categorias\Mapper\Categorias as CategoriasMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CategoriasFactory implements FactoryInterface
{
     /**
     * Cria a mapper de Categorias
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return CategoriasMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CategoriasMapper(
            $serviceLocator->get('config')['db']
        );
    }
}
