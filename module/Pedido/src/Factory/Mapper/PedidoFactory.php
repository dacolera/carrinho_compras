<?php

namespace Pedido\Factory\Mapper;

use Pedido\Mapper\Pedido as PedidoMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PedidoFactory implements FactoryInterface
{
     /**
     * Cria a mapper de Pedido
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return PedidoMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PedidoMapper(
            $serviceLocator->get('config')['db']
        );
    }
}
