<?php

namespace Categorias\Model;

use Zend\Db\Adapter\AdapterInterface;

class Categorias
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}