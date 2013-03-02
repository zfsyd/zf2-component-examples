<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Demonstrates how to use the SQL Select object provided via the framework.
 * Includes Selects, Where, Joins etc.
 */
class SqlSelectStatementController extends AbstractActionController
{
    /**
     * Select functionality
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function selectAction()
    {
        $select = $this->getSqlSelect();
    
        // Select a table
        $select->from('animal');
        $statement = $this->getDbAdapter()->prepareStatementForSqlObject($select);
        $results = $statement->execute();
    
        return new ViewModel(array(
            'animals' => $results
        ));
    }
    
    /**
     * Where clause
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function whereAction()
    {
        $select = $this->getSqlSelect();
        
        // Select a table
        $select->from('animal');
        // Add a where clause if you need one
        $select->where(array('name' => 'horse'));
        $statement = $this->getDbAdapter()->prepareStatementForSqlObject($select);
        
        return new ViewModel(array(
            'animals' => $statement->execute()
        ));
    }
    
    /**
     * Simple where clause
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function joinAction()
    {
        $select = $this->getSqlSelect();
        
        // Select a table
        $select->from('animal');
        $select->where(array('name' => 'horse'));
        // Join the user table
        $select->join('user', 'name.username = user.username');
        $statement = $this->getDbAdapter()->prepareStatementForSqlObject($select);
        
        return new ViewModel(array(
            'animals' => $statement->execute()
        ));
    }
    
    /**
     * More upbeat left join.  As a side note, the array('*') in the join is the list of columns 
     * we want from the join'ed table.
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function joinLeftAction()
    {
        $select = $this->getSqlSelect();
    
        // Select a table
        $select->from('animal');
        // Add a where clause if you need one
        $select->where(array('name' => 'horse'));
        $select->join('user',
            'name.username = user.username',
            array('*'),
            \Zend\Db\Sql\Select::JOIN_LEFT
        );
        $statement = $this->getDbAdapter()->prepareStatementForSqlObject($select);
        $results = $statement->execute();
    
        return new ViewModel(array(
            'animals' => $results
        ));
    }
    
    /**
     * Grab SQL Select Object
     * 
     * @return Zend\Db\Adapter\Adapter
     */
    public function getSqlSelect()
    {
        // Create new SQL object
        $sql = new \Zend\Db\Sql\Sql($this->getDbAdapter());
        return $sql->select();
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