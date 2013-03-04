<?php 

namespace ServiceManagerExamples\TutorialModels;

use ServiceManagerExamples\TutorialModels\MagicPractitionerInterface;
use ServiceManagerExamples\TutorialModels\MagicStrategyInterface;

/**
 * Magician is a practitioner of magic
 * @author Dave Clark (dave@dkcwd.com.au)
 */
class Magician implements MagicPractitionerInterface
{
    /**
     * Property representing the magic practitioner's magic strategy
     * @var MagicStrategyInterface
     */
    protected $magicStrategy;
    
    /**
     * Sets the value of the magic strategy property
     * @param MagicStrategyInterface $magicStrategy 
     */
    public function setMagicStrategy(MagicStrategyInterface $magicStrategy)
    {
        $this->magicStrategy = $magicStrategy;
    }  
    
}