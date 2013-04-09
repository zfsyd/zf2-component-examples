<?php
/**
 * Address Fieldset
 * @author Dave Clark 
 */

namespace ZfSydZendFormExamples\Models\Forms;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

class AddressForm extends Form
{
    public function __construct()
    {
        parent::__construct('Address');
        $this->setAttribute('method', 'post')
             ->setHydrator(new ObjectPropertyHydrator(false))
             ->setInputFilter(new InputFilter());

        // add the address fieldset
        $this->add(array(
            'type' => 'ZfSydZendFormExamples\Models\Fieldsets\AddressFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        // adding csrf token
        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));

        // add submit button
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send'
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