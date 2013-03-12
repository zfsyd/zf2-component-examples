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
     * Depending on your selects, you may or may not be able to prepare all statements. If that is the case, or you
     * need a quick and easy way to execute queries, use this method.
     * 
     * The query() method will create a new statement object, prepare it if necessary, execute and return a result set.
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function simpleQueryAction()
    {
        $adapter = $this->getDbAdapterFromServiceLocator();
    
        // Manually query the DB and create a statement obj
        $results = $adapter->query('SELECT * FROM `animal` WHERE `name` = ?', array('Horse'));
        // Execute the query and send the result to the view
        return new ViewModel(array(
            'animals' => $results
        ));
    }
    
    /**
     * Grab the DB Adapter from the service adapter
     * 
     * Manually query the DB.  Please avoid this methods unless necessary (see Select or other methods)
     * If you end up writing manual statements you will suffer from code that cannot be switched
     * between different DB adapters.
     * 
     * Using the create and execute method gives you enhanced control over the query() method. 
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function serviceAdapterAction()
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
     * Setup the adapter locally and query DB.
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function localAdapterAction()
    {
        $adapter = $this->getDbAdapter();
        
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
                'database' => 'SydZfComponents',
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