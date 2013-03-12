<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Example usage of the Table Gateways.
 * Essentially, the table gateway is here to make things easier by representing a table in the DB
 */
class TableGatewayController extends AbstractActionController
{
    /**
     * Update our table
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function selectAction()
    {
        $adapter = $this->getDbAdapter();
        
        $hostTable = new \Zend\Db\TableGateway\TableGateway('animal', $adapter);
        $results = $hostTable->select(array('name' => 'horse'));

        return new ViewModel(array(
            'animals' => $results
        ));
    }

    /**
     * Grab the DB adapter from the ServiceLocator
     *
     * @return Zend\Db\Adapter\Adapter
     */
    public function getDbAdapter()
    {
        // Added to the service locator in /config/autoload/global.php
        $sm = $this->getServiceLocator();
        return $sm->get('Zend\Db\Adapter\Adapter');
    }
}