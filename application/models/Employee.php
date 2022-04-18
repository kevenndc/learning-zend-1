<?php

class Application_Model_Employee extends Application_Model_ModelAbstract
{

    protected $_personId;
    protected $_addressId;
    protected $_position;

    /**
     * @return string
     */
    public function getPersonId()
    {
        return $this->_personId;
    }

    /**
     * @param string $personId
     * @return Application_Model_Employee
     */
    public function setPersonId($personId)
    {
        $this->_personId = $personId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressId()
    {
        return $this->_addressId;
    }

    /**
     * @param string $addressId
     * @return Application_Model_Employee
     */
    public function setAddressId($addressId)
    {
        $this->_addressId = $addressId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->_position;
    }

    /**
     * @param string $position
     * @return Application_Model_Employee
     */
    public function setPosition($position)
    {
        $this->_position = $position;
        return $this;
    }

    public function toArray()
    {
        return array(
            'person_id'     => $this->getPersonId(),
            'address_id'    => $this->getAddressId(),
            'position'      => $this->getPosition(),
        );
    }
}

