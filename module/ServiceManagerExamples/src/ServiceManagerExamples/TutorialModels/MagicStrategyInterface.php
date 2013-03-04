<?php 

namespace ServiceManagerExamples\TutorialModels;

/**
 * A simple interface to define common magic strategy methods   
 * @author Dave Clark (dave@dkcwd.com.au)
 */
interface MagicStrategyInterface
{
    /**
     * Builds anticipation prior to doing magic
     * @param mixed $charisma
     * @return array $response 
     */
    public function buildAnticipation($charisma);
    
    /**
     * Does magic based on array of tricks
     * @param array $tricks
     */
    public function doMagic(array $tricks);
    
    /**
     * Gets reward  
     * @return string $reward
     */
    public function getReward();
}