<?php

namespace ZfSydZendFormExamples\Controllers;

use ZfSydZendFormExamples\Models\Address;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SimpleFormExampleController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getServiceLocator()->get('zf-syd_simple_address_form');
        $address = new Address();
        $form->bind($address);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
                $addressOutput = $address->getFullAddressAsHtmlTable();
            }
        }

        return new ViewModel(array(
            'form'    => $form,
            'address' => $addressOutput,
        ));
    }
}
