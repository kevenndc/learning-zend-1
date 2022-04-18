<?php

class Application_Model_Address extends Application_Model_ModelAbstract
{

    protected $_id;
    protected $_personId;
    protected $_city;
    protected $_state;
    protected $_street;
    protected $_houseNumber;
    protected $_postalCode;
    protected $_complement;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     * @return Application_Model_Address
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonId()
    {
        return $this->_personId;
    }

    /**
     * @param string $personId
     * @return Application_Model_Address
     */
    public function setPersonId($personId)
    {
        $this->_personId = $personId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param string $city
     * @return Application_Model_Address
     */
    public function setCity($city)
    {
        $this->_city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }
    
    /**
     * @param string $state
     * @return Application_Model_Address
     */
    public function setState($state)
    {
        $this->_state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @param string $street
     * @return Application_Model_Address
     */
    public function setStreet($street)
    {
        $this->_street = $street;
        return $this;
    }

    /**
     * @return int
     */
    public function getHouseNumber()
    {
        return $this->_houseNumber;
    }

    /**
     * @param int $houseNumber
     * @return Application_Model_Address
     */
    public function setHouseNumber($houseNumber)
    {
        $this->_houseNumber = $houseNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    /**
     * @param string $postalCode
     * @return Application_Model_Address
     */
    public function setPostalCode($postalCode)
    {
        $this->_postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplement()
    {
        return $this->_complement;
    }

    /**
     * @param string $complement
     * @return Application_Model_Address
     */
    public function setComplement($complement)
    {
        $this->_complement = $complement;
        return $this;
    }

    public function toArray()
    {
        return array(
            'id'            => $this->getId(),
            'person_id'     => $this->getPersonId(),
            'city'          => $this->getCity(),
            'state'         => $this->getState(),
            'street'        => $this->getStreet(),
            'house_number'  => $this->getHouseNumber(),
            'postal_code'   => $this->getPostalCode(),
            'complement'    => $this->getComplement(),
        );
    }

}