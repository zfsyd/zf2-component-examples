<?php
/**
 * Address
 * @author Dave Clark 
 */

namespace ZfSydZendFormExamples\Models;

class Address
{
    public $line1;
    public $line2;
    public $line3;
    public $line4;
    public $city;
    public $postCode;
    public $country;

    public function exchangeArray($data)
    {
        $this->line1     = (isset($data['line1'])) ? $data['line1'] : null;
        $this->line2     = (isset($data['line2'])) ? $data['line2'] : null;
        $this->line3     = (isset($data['line3'])) ? $data['line3'] : null;
        $this->line4     = (isset($data['line4'])) ? $data['line4'] : null;
        $this->city      = (isset($data['city'])) ? $data['city'] : null;
        $this->postCode  = (isset($data['postCode'])) ? $data['postCode'] : null;
        $this->country   = (isset($data['country'])) ? $data['country'] : null;
    }

    /**
     * return a simple formatted address string
     * @return string
     */
    public function getFullAddressAsSingleLineString()
    {
        $items = array(
            $this->line1,
            $this->line2,
            $this->line3,
            $this->line4,
            $this->city,
            $this->postCode,
            $this->country
        );

        $address = '';

        foreach ($items as $item) {
            if (!empty($item)) {
                $address .= $item . ', ';
            }
        }

        return trim($address, ', ');
    }

    /**
     * return a simple formatted address string
     * @return string
     */
    public function getFullAddressAsHtmlTable()
    {
        $items = array(
            $this->line1,
            $this->line2,
            $this->line3,
            $this->line4,
            $this->city,
            $this->postCode,
            $this->country
        );

        $address = '<table>';
        foreach ($items as $item) {
            if (!empty($item)) {
                $address .= '<tr>';
                $address .= '<td>';
                $address .= $item;
                $address .= '</td>';
                $address .= '</tr>';
            }
        }
        $address .= '</table>';

        return $address;
    }
}