<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * The Platform API provides cross database functionality to deal with nuances such as how identifiers or values are
 * quoted.
 */
class PlatformObjectController extends AbstractActionController
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
        $result->description = 'Run horsey run!';
        $result->save();
    
        // Delete record
        $results = $hostTable->select(array('name' => 'horse'));
        $result = $results->current();
        $result->delete();
        
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