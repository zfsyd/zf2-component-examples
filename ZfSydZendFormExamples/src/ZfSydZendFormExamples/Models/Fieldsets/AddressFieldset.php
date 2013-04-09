<?php
/**
 * Address Fieldset
 * @author Dave Clark 
 */

namespace ZfSydZendFormExamples\Models\Fieldsets;

use ZfSydZendFormExamples\Models\Address;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

class AddressFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('Address');
        $this->setHydrator(new ObjectPropertyHydrator(false))
             ->setObject(new Address())
             ->setLabel('Address');

        /**
         * begin adding elements to the fieldset, in this example
         * only line1, line2 and country from the address will be
         * required fields.
         */
        // Line 1 - note use of attributes => array('required' => 'required'))
        $this->add(array(
            'name' => 'line1',
            'options' => array(
                'label' => 'Line 1:'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        // Line 2
        $this->add(array(
            'name' => 'line2',
            'options' => array(
                'label' => 'Line 2:'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        // Line 3
        $this->add(array(
            'name' => 'line3',
            'options' => array(
                'label' => 'Line 3:'
            ),
        ));

        // Line 4
        $this->add(array(
            'name' => 'line4',
            'options' => array(
                'label' => 'Line 4:'
            ),
        ));

        // City
        $this->add(array(
            'name' => 'city',
            'options' => array(
                'label' => 'City:'
            ),
        ));

        // Post code
        $this->add(array(
            'name' => 'postCode',
            'options' => array(
                'label' => 'Post code:'
            ),
        ));

        // Country
        $this->add(array(
            'name' => 'country',
            'options' => array(
                'label' => 'Country:'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'line1' => array(
                'required' => true,
            ),
            'line2' => array(
                'required' => true,
            ),
            'country' => array(
                'required' => true,
            ),
        );
    }
}