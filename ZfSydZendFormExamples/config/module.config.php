<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(

    // defining the routing for this module
    'router' => array(
        'routes' => array(
            'zf-syd-zend-form-examples' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/zf-syd-zend-form-examples',
                    'defaults' => array(
                        '__NAMESPACE__' => 'ZfSydZendFormExamples\Controllers',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:controller[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        // Reminder: invokables are classes that can be instantiated as objects without additional parameters
        // for example: $obj = new MyClass()
        'invokables' => array(
            // Registering a unique key with the service manager and specifying the class the key relates to
            'ZfSydZendFormExamples\Controllers\Index' => 'ZfSydZendFormExamples\Controllers\IndexController',
            'ZfSydZendFormExamples\Controllers\SimpleFormExample' => 'ZfSydZendFormExamples\Controllers\SimpleFormExampleController',
        ),
    ),

    // registering the path to view scripts for the module
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
