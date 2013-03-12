<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Building upon selects, we have access to inserts, updates and deletes
 */
class SqlCommandStatementController extends AbstractActionController
{
    /**
     * Insert into our table
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function insertAction()
    {
        $sql = new \Zend\Db\Sql\Sql($this->getDbAdapter());
        
        $insert = $sql->insert('animal');
        $insert->columns(array('name', 'description', 'viewCount', 'username'));
        $insert->values(array(
            'name' => 'fox',
            'description' => 'Jumps',
            'viewCount' => 0,
            'username' => 'user6')
        );
        $statement = $sql->prepareStatementForSqlObject($insert);
        
        return new ViewModel(array(
            'result' => $statement->execute()
        ));
    }
    
    /**
     * Update our table
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function updateAction()
    {
        $sql = new \Zend\Db\Sql\Sql($this->getDbAdapter());
        
        $update = $sql->update('animal');
        $update->set(array('viewCount' => '7'));
        $update->where('animalId = 3');
        
        $statement = $sql->prepareStatementForSqlObject($update);
        return new ViewModel(array(
            'result' => $statement->execute()
        ));
    }
    
    /**
     * Delete from the table
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        $sql = new \Zend\Db\Sql\Sql($this->getDbAdapter());
        
        $delete = $sql->delete('');
        $delete->from('animal');
        $delete->where(array('name' => 'fox'));
        
        $statement = $sql->prepareStatementForSqlObject($delete);
        return new ViewModel(array(
            'result' =>  $statement->execute()
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