<?php

class Application_Model_PersonMapper
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
            $this->setDbTable('Application_Model_DbTable_Person');
        }

        return $this->_dbTable;
    }

    public function save(Application_Model_Person $person)
    {
        $data = array(
            'name'  => $person->getName(),
            'email' => $person->getEmail(),
            'phone' => $person->getPhone(),
            'cpf'   => $person->getCpf(),
        );
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
