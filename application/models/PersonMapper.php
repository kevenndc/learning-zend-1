<?php

class Application_Model_PersonMapper extends Application_Model_ModelMapperAbstract
{
    
    /**
     * @return Application_Model_DbTable_Person
     * @throws Exception
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Person');
        }

        return $this->_dbTable;
    }

    public function save(Application_Model_Person $person)
    {
        $data = $person->toArray();

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

        return new Application_Model_Person($row->toArray());
    }

    public function fetchAll()
    {
        $result = $this->getDbTable()->fetchAll();
        $entries = array();

        foreach ($result as $row) {
            $entries[] = new Application_Model_Person($row->toArray());
        }

        return $entries;
    }

    public function delete($id)
    {
        $result = $this->getDbTable()->find($id);

        if (!count($result)) {
            return false;
        }

        $row = $result->current();

        return (bool) $row->delete();
    }

}
