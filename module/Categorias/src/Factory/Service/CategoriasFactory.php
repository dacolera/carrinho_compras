<?php

namespace Categorias\Factory\Service;

use Categorias\Service\Categorias as CategoriasService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CategoriasFactory implements FactoryInterface
{
     /**
     * Cria a Service de CAtegorias
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return CategoriasService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CategoriasService(
            $serviceLocator->get('Categorias\Mapper\Categorias')
        );
    }
}