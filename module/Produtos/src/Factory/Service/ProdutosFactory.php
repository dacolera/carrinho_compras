<?php

namespace Produtos\Factory\Service;

use Produtos\Service\Produtos as ProdutosService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdutosFactory implements FactoryInterface
{
     /**
     * Cria a Service de Produtos
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return ProdutosService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProdutosService(
            $serviceLocator->get('Produtos\Mapper\Produtos')
        );
    }
}