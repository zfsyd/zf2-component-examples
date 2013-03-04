<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ServiceManagerExamples for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ServiceManagerExamples;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }
    
    
    
    /**
     * Lets you register objects you want to share using the ServiceManager.
     * You can use this method or simply add the 'service_manager' key to your
     * module.config.php file if it does not already exist
     */
    public function getServiceConfig()
    {        
        // Detailed information has been provided within the module.config.php file
        // Please refer to that information before altering the code below.
         
        // example for registering an instantiated object under 'services'
        $evil = new \ServiceManagerExamples\TutorialModels\MagicStrategyEvil();
        
        return array (
            
            // Here we register the instantiated object as a service
            'services' => array(
                'evil_magic_strategy' => $evil,
            ),
            
        );        
    }
    
    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap($e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
}
