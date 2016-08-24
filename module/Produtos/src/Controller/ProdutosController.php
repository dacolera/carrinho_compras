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

        $categoriasService = $this->getServiceLocator()->get('Categorias\Service\Categorias');
        $categoria = $categoriasService->getCategoriaPorId($categoriaId);

        $produtosService = $this->getProdutosService();
        $produtos = $produtosService->getProdutosPorCategorias($categoriaId);

        return (new ViewModel())
            ->setVariable('categoria', $categoria)
            ->setVariable('produtos', $produtos);
    }

    /**
     * Renderiza a tela de detalhe do produto
     * @return ViewModel
     */
    public function detalhaProdutoAction()
    {
        $produtoId = $this->params('produtoId', null);

        $produtosService = $this->getProdutosService();

        $produto = $produtosService->getProdutoPorId($produtoId);
        $produtosCaracteristicas = $produtosService->getCaracteristicasProdutoPorId($produtoId);

        return (new ViewModel())
            ->setVariable('produto', $produto)
            ->setVariable('produtosCaracteristicas', $produtosCaracteristicas);
    }

    /**
     * Ratorna uma instancia de ProdutosService
     * @return Produtos\Service\Produtos
     */
    private function getProdutosService()
    {
        return $this->getServiceLocator()->get('Produtos\Service\Produtos');
    }
}
