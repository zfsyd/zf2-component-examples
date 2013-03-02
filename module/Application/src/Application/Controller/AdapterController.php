<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Setup the DB Adapter
 */
class AdapterController extends AbstractActionController
{
    /**
     * Manually query the DB.  Please avoid this methods unless necessary (see Select or other methods)
     * If you end up writing manual statements you will suffer from code that cannot be switched
     * between different DB adapters.
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function manualAction()
    {
        $adapter = $this->getDbAdapterFromServiceLocator();
        
        // Manually query the DB and create a statement obj
        $stmt = $adapter->createStatement('SELECT * FROM animal');
        // Execute the query and send the result to the view
        return new ViewModel(array(
            'animals' => $stmt->execute()
        ));
    }
    
    /**
     * Manually create a DB adapter. If you really do not want to use the one in the service
     * locator or do not need to for another reason you can do so as follows
     * 
     * @return \Zend\Db\Adapter\Adapter
     */
    public function getDbAdapter()
    {
        return new \Zend\Db\Adapter\Adapter(
            array(
                'driver' => 'Pdo_Mysql',
                'database' => 'app',
                'username' => 'sydZf',
                'password' => 'sydZf'
            )
        );
    }
    
    /**
     * Grab the DB adapter from the ServiceLocator
     * 
     * @return Zend\Db\Adapter\Adapter
     */
    public function getDbAdapterFromServiceLocator()
    {
        // Added to the service locator in /config/autoload/global.php
        $sm = $this->getServiceLocator();
        return $sm->get('Zend\Db\Adapter\Adapter');
    }
}