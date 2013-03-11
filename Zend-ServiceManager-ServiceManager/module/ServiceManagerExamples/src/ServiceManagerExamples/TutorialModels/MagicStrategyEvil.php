<?php 

namespace ServiceManagerExamples\TutorialModels;

use ServiceManagerExamples\TutorialModels\MagicStrategyInterface;

/**
 * MagicStrategyGood is an evil implementation of MagicStrategyInterface
 * @author Dave Clark (dave@dkcwd.com.au)
 */
class MagicStrategyEvil implements MagicStrategyInterface
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
                'Enter using a jetpack powered by the tears of an orphan then....',
                'Kick assistant and sneer at the audience'
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
        $reward = 'The audience boo and throw money to the assistant';
        return $reward;        
    }
}