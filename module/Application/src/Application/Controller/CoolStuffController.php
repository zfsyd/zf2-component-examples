<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Some cool stuff you can do will be documented here
 */
class CoolStuffController extends AbstractActionController
{
    /**
     * Echo out SQL Strings
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function sqlStringAction()
    {
        $sql = new \Zend\Db\Sql\Sql($this->getDbAdapter());
        
        $select = $sql->select();
        $select->from('animal');
        $select->where(array('name' => 'horse'));
        $select->join('user', 'animal.username = user.username');
        
        return new ViewModel(array(
            'string' => $select->getSqlString()
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