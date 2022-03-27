<?php

class Application_Model_Address
{
    protected $_id;
    protected $_personId;
    protected $_city;
    protected $_street;
    protected $_houseNumber;
    protected $_postalCode;
    protected $_complement;

    public function getCity()
    {
        return $this->_city;
    }

    public function setCity($city)
    {
        $this->_city = $city;

        return $this;
    }

    public function getStreet()
    {
        return $this->_street;
    }

    public function setStreet($street)
    {
        $this->_street = $street;

        return $this;
    }

    public function getHouseNumber()
    {
        return $this->_houseNumber;
    }

    public function setHouseNumber($houseNumber)
    {
        $this->_houseNumber = $houseNumber;
    }

    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->_postalCode = $postalCode;

        return $this;
    }

    public function getComplement()
    {
        return $this->_complement;
    }

    public function setComplement($complement)
    {
        $this->_complement = $complement;

        return $this;
    }
}