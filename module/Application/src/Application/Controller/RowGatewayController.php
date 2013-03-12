<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * RowGateways are enhancements to the TableGateway objects.  You can request your TableGateway to
 * return RowGateway objects, which will allow you to revise and modify data sets.
 * 
 * When you provide the RowGatewayFeature as an optional parameter to the TableGateway, you are 
 * returned a collection of RowGateway objects rather than arrays.
 */
class RowGatewayController extends AbstractActionController
{
    /**
     * Update the returned objects.
     * A RowGateway gives us access to two main methods to modify data: save() and delete()
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function updateAction()
    {
        $adapter = $this->getDbAdapter();
    
        $hostTable = new \Zend\Db\TableGateway\TableGateway(
            'animal',
            $adapter,
            new \Zend\Db\TableGateway\Feature\RowGatewayFeature('animalId')
        );
        
        // Update record
        $results = $hostTable->select(array('name' => 'horse'));
        $result = $results->current();
        if (empty($result)) {
            die('Nothing to update');
        }
        $result->description = 'Run horsey run!';
        $result->save();
        
        return new ViewModel(array(
            'result' => $result
        ));
    }
    
    /**
     * Delete the returned row.
     * A RowGateway gives us access to two main methods to modify data: save() and delete()
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        $adapter = $this->getDbAdapter();
    
        $hostTable = new \Zend\Db\TableGateway\TableGateway(
            'animal',
            $adapter,
            new \Zend\Db\TableGateway\Feature\RowGatewayFeature('animalId')
        );
    
        // Delete record
        $results = $hostTable->select(array('name' => 'fox'));
        $result = $results->current();
        if (empty($result)) {
            die('Nothing to delete');
        }
        $result->delete();
    
        return new ViewModel(array(
            'result' => $result
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