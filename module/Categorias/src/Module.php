<?php

namespace Categorias;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Categorias\Model\Categorias' =>  'Categorias\Model\Factory\Categorias',
            ),
        );
    }
}