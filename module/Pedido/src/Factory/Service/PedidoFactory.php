<?php

namespace Pedido\Factory\Service;

use Pedido\Service\Pedido as PedidoService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PedidoFactory implements FactoryInterface
{
     /**
     * Cria a Service de Pedido
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return PedidoService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PedidoService(
            $serviceLocator->get('Pedido\Mapper\Pedido')
        );
    }
}
