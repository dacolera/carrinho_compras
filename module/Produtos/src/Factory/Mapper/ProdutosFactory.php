<?php

namespace Produtos\Factory\Mapper;

use Produtos\Mapper\Produtos as ProdutosMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdutosFactory implements FactoryInterface
{
     /**
     * Cria a mapper de Produtos
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return ProdutosMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProdutosMapper(
        	$serviceLocator->get('config')['db']
        );
    }
}