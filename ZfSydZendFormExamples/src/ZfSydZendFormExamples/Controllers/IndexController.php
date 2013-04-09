<?php

namespace ZfSydZendFormExamples\Controllers;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->redirect()->toUrl('/zf-syd-zend-form-examples/simple-form-example');
    }
}
