<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'serviceManager' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/service-manager[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\ServiceManager',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'coolstuff' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/cool-stuff[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\CoolStuff',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'adapter' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/adapter[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Adapter',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'platformobject' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/platform-object[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\PlatformObject',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'rowgateway' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/row-gateway[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\RowGateway',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'sqlcommandstatement' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/sql-command-statement[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\SqlCommandStatement',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'sqlselectstatement' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/sql-select-statement[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\SqlSelectStatement',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
            'tablegateway' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/table-gateway[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\TableGateway',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard'
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Adapter' => 'Application\Controller\AdapterController',
            'Application\Controller\ServiceManager' => 'Application\Controller\ServiceManagerController',
            'Application\Controller\SqlSelectStatement' => 'Application\Controller\SqlSelectStatementController',
            'Application\Controller\SqlCommandStatement' => 'Application\Controller\SqlCommandStatementController',
            'Application\Controller\PlatformObject' => 'Application\Controller\PlatformObjectController',
            'Application\Controller\RowGateway' => 'Application\Controller\RowGatewayController',
            'Application\Controller\TableGateway' => 'Application\Controller\TableGatewayController',
            'Application\Controller\CoolStuff' => 'Application\Controller\CoolStuffController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
