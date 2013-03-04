<?php 

namespace ServiceManagerExamples\TutorialModels;

use ServiceManagerExamples\TutorialModels\MagicStrategyInterface;

/**
 * MagicStrategyGood is a heroic implementation of MagicStrategyInterface
 * @author Dave Clark (dave@dkcwd.com.au)
 */
class MagicStrategyGood implements MagicStrategyInterface
{
    /**
     * Builds anticipation prior to doing magic
     * @param mixed $charisma
     * @return array $response 
     */
    public function buildAnticipation($charisma)
    {        
        $response = array();
        if (!empty($charisma)) {
            $response = array(
                'Enter riding a unicorn then....',
                'Heroically bow to the audience'
            );            
        }
        return $response;        
    }
    
    /**
     * Does magic based on array of tricks
     * @param array $tricks
     */
    public function doMagic(array $tricks)
    {
        foreach ($tricks as $trick) {
            // nothing....magic isn't real :-(
        }
    }
    
    /**
     * Gets reward  
     * @return string $reward
     */
    public function getReward()
    {
        $reward = 'The audience cheer and throw money';
        return $reward;        
    }
}