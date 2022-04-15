<?php

class Application_Model_PersonMapper
{
    /**
     * @var Application_Model_DbTable_Person $_dbTable
     */
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
        $data = [
            'name'  => $person->getName(),
            'email' => $person->getEmail(),
            'phone' => $person->getPhone(),
            'cpf'   => $person->getCpf(),
        ];

        if (null === $person->getId()) {
            return $this->getDbTable()->insert($data);
        }

        return $this->getDbTable()->update($data, $person->getId());
    }

    public function find($id)
    {
        $result = $this->getDbTable()->find($id);

        if (!count($result)) {
            return null;
        }

        $row = $result->current();

        return new Application_Model_Person((array) $row);
    }

    public function fetchAll()
    {
        $result = $this->getDbTable()->fetchAll();
        $entries = [];

        foreach ($result as $row) {
            $entries[] = new Application_Model_Person((array) $row);
        }

        return $entries;
    }
}
