<?php

class Application_Model_AddressMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }

        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }

        $this->_dbTable = $dbTable;

        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Address');
        }

        return $this->_dbTable;
    }

    public function save($address)
    {
        //
    }

    public function find($id, $address)
    {
        //
    }

    public function fetchAll()
    {
        //
    }
}

