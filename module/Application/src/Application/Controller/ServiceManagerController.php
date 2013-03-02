<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Service manager controller.  
 * Simply enough, uses the service locator to grab all entries the required table.
 */
class ServiceManagerController extends AbstractActionController
{
    /**
     * @var Application\Model\animalTable
     */
    protected $animalTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'animals' => $this->getAnimalTable()->fetchAll(),
        ));
    }

    /**
     * Grabs the table through the ServiceLocator.
     * If unsure where this is configured, check out Application/Module.php
     * 
     * Remember, the file Application/config/module.config.php is for non-logic config options only.
     * The Application/Module.php is for logic based config such as sevice locator setup
     */
    public function getAnimalTable()
    {
        if (! $this->animalTable) {
            $sm = $this->getServiceLocator();
            $this->animalTable = $sm->get('Application\Model\animalTable');
        }
        return $this->animalTable;
    }
}