<?php

namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HomeController extends AbstractActionController
{
    public function indexAction()
    {

    	$categorias = array(
    		'sala',
    		'cozinha',
    		'sei la'
    	);

    	return (new ViewModel())
    		->setVariable('categorias', $categorias);
    }
}