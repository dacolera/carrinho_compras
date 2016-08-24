<?php

namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HomeController extends AbstractActionController
{
    /**
     * Renderiza a home do site
     * @return ViewModel
     */
    public function indexAction()
    {
        $categoriasModel = $this->getServiceLocator()->get('Categorias\Service\Categorias');

        $categorias = $categoriasModel->getCategorias();

        return (new ViewModel())
            ->setVariable('categorias', $categorias);
    }
}
