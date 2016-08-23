<?php

namespace Produtos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProdutosController extends AbstractActionController
{
	/**
	 * Renderiza a tela de produtos por Categoria
	 * @return ViewModel
	 */
    public function listaProdutosPorCategoriaAction()
    {
        $categoriaId = $this->params('categoriaId', null);
        $categoriaDescricao = "Teste";

        $produtosService = $this->getServiceLocator()->get('Produtos\Service\Produtos');
    	
        $produtos = $produtosService->getProdutosPorCategorias($categoriaId);

    	return (new ViewModel())
    		->setVariable('produtos', $produtos)
            ->setVariable('categoriaDescricao', $categoriaDescricao);
    }

    /**
     * Renderiza a tela de detalhe do produto
     * @return ViewModel
     */
    public function detalhaProdutoAction()
    {
        $produtoId = $this->params('produtoId', null);

        die('Tela de detalhe do produto: ' . $produtoId );
    }
}