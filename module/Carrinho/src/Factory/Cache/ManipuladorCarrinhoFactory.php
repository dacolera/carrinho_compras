<?php

namespace Carrinho\Factory\Cache;

use Carrinho\Cache\ManipuladorCarrinho;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ManipuladorCarrinhoFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return ManipuladorCarrinho
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ManipuladorCarrinho(
            $serviceLocator->get('sessionService')
        );
    }
}
