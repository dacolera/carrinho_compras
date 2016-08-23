<?php

namespace Categorias\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoriasController extends AbstractActionController
{
	/**
	 * Renderiza a tela de produtos por Categoria
	 * @return ViewModel
	 */
    public function listaProdutosPorCategoriaAction()
    {
    	$categoriasModel = $this->getServiceLocator()->get('Categorias\Service\Categorias');
    	
        $categorias = $categoriasModel->getCategorias();

    	return (new ViewModel())
    		->setVariable('categorias', $categorias);
    }
}