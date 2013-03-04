<?php
return array(
    'service_manager' => array(        
        
        // You can do this here or define the method getServiceConfig() in your module.php
        // An example is set up in the module.php file so you can see the way it looks.
        
        // We have assigned a 'unique' key to use for accessing a particular magic strategy
        // ServiceManager allows us to use a convenience method to get the instance of an
        // object which we have chosen to share using a unique key.
        
        // See the indexAction() of the TutorialController where we use the convenience method:
        // $magicStrategy = $this->getServiceLocator()->get('magic_strategy');

        
        /* Invokables */
        
        // Invokables are classes which can be instantiated directly using the 'new' keyword.
        // The full name of the class is the value which corresponds to the unique key. 
        // In other words where no other parameters are required to instantiate an object from 
        // the class. 
        'invokables' => array(
            'magic_strategy' => 'ServiceManagerExamples\TutorialModels\MagicStrategyEvil',
        ),    

        
        /* Services */
        
        // Services are used for reqistering objects which have already been instantiated.
        // Since we would have to have instantiated the object outside of this return 
        // statement an example has been outlined below with a working example provided
        // in the getServiceCongig() method defined in the module.php file
        
        // 'services' => array(
        //     'unique_key' => $someVar,            
        // )
        
        
        /* Factories */
        
        // Factories are used when you want to configure a particular instance of an object.
        // The configured object is returned by a callback like the example shown below.
        // If we wanted a fully configured instance of a Magician using the MagicStrategyGood
        // magic strategy then we could assign a key like 'good_magician' and configure the
        // instance using a call back
        'factories' => array(
            'good_magician' => function ($serviceManager) {
                // Instantiate a Magician object
                $magician = new \ServiceManagerExamples\TutorialModels\Magician();
                
                // Instantiate an appropriate MagicStrategy object in this case MagicStrategyGood                
                $magicStrategy = new \ServiceManagerExamples\TutorialModels\MagicStrategyGood();
                                               
                // The Magician object setMagicStrategy() method requires it's only parameter
                // to be an object which implements MagicStrategyInterface
                $magician->setMagicStrategy($magicStrategy);
                
                // Now all we need to do is return the configured Magician object.
                // We will be able to access it through the ServiceManager using the unique key
                // e.g. from inside one of our action controllers: 
                // $goodMagician = $this->getServiceLocator()->get('good_magician');
                return $magician;
            },
            
            // let's add another factory, this time to create an evil Magician....
            'evil_magician' => function ($serviceManager) {
                // Instantiate a Magician object
                $magician = new \ServiceManagerExamples\TutorialModels\Magician();
                
                // Now just for illustrative purposes and to get you thinking....
                
                // Instead of instantiating a new MagicStrategyEvil object let's take advantage
                // of the default configuration settings in this tutorial.
                
                // We had defined a key for 'magic_strategy' and it was originally set to use
                // MagicStrategyEvil.
                  
                // This means we can use the ServiceManager get() method to get that object.
                
                // Bear in mind the implications of unique key naming strategies....we are using
                // 'evil_magician' for this factory unique key and we are about to use 
                // $serviceManager->get('magic_strategy').
                  
                // Think: What if the class referenced under 'magic_strategy' was to be changed 
                // to reference MagicStrategyGood instead? 
                
                // We would have a completely different strategy which could confuse users of our
                // module or cause subtle unnoticed yet potentially damaging results.                 
                
                // Example using Service Manager to get the magic strategy
                $magicStrategy = $serviceManager->get('magic_strategy');
                 
                // As before the Magician object setMagicStrategy() method requires it's only 
                // parameter to be an object which implements MagicStrategyInterface
                $magician->setMagicStrategy($magicStrategy);
            
                // Finally we need to return the configured Magician object.
                // We will be able to access it through the ServiceManager using the unique key
                // e.g. from inside one of our action controllers:
                // $evilMagician = $this->getServiceLocator()->get('evil_magician');
                return $magician;
            },
        ),
        
        
        /* Aliases */
            
        // Aliases are used when you want to provide a user with flexibility to choose
        // an alternative class to provide the functionality you originally provided using 
        // a specific class.
        'aliases' => array(
            'a_unique_key_for_our_alias' => 'ServiceManagerExamples\TutorialModels\Magician',
        ),
        // Continuing with our Magic Practitioner examples a user might want to use a 3rd party
        // Wizard or Witch class which implements MagicPractitionerInterface instead of the 
        // Magician class we specified above....

        
        /* 
         * @TODO Add initializers and abstract_factories 
         */        
        
        
    ),    
    
    'controllers' => array(
        'invokables' => array(
            'ServiceManagerExamples\Controller\Tutorial' => 'ServiceManagerExamples\Controller\TutorialController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'service-manager-examples' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/service-manager-examples-tutorial',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'ServiceManagerExamples\Controller',
                        'controller'    => 'Tutorial',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ServiceManagerExamples' => __DIR__ . '/../view',
        ),
    ),
);
