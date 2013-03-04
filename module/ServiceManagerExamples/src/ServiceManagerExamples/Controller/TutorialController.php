<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ServiceManagerExamples for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ServiceManagerExamples\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class TutorialController extends AbstractActionController
{
    public function indexAction()
    {
        $charisma = 'magicElixer';
        
        $magicStrategy = $this->getServiceLocator()->get('magic_strategy');        
        (array) $response = $magicStrategy->buildAnticipation($charisma);               
        
        $tricks = array(range(1,5));
        $magicStrategy->doMagic($tricks);
                
        (string) $reward = $magicStrategy->getReward();
        
        return array(
            'response' => $response,
            'reward'   => $reward,
        );
    }
    
    public function demoAction()
    {
        // Due to the :controller and :action parameters set in the default route
        // (see module.config.php)
        // you can request this action by browsing to /tutorial/tutorial/demo
        
        // Demoing the ServiceManger 'factory' entry we set up 
        $goodMagician = $this->getServiceLocator()->get('good_magician');
        var_dump($goodMagician);
        
        $evilMagician = $this->getServiceLocator()->get('evil_magician');
        var_dump($evilMagician);
        
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /tutorial/tutorial/foo
        return array();
    }
}
