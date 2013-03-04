<?php 

namespace ServiceManagerExamples\TutorialModels;

use ServiceManagerExamples\TutorialModels\MagicStrategyInterface;

/**
 * A simple interface to define common magic practitioner methods 
 * @author Dave Clark (dave@dkcwd.com.au)
 */
interface MagicPractitionerInterface
{   
    /**
     * Sets the value of the magic strategy property
     * @param MagicStrategyInterface $magicStrategy 
     */
    public function setMagicStrategy(MagicStrategyInterface $magicStrategy);
    
}