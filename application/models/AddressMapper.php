<?php

class Application_Model_AddressMapper extends Application_Model_ModelMapperAbstract
{
    
    /**
     * @return Application_Model_DbTable_Address
     * @throws Exception
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Address');
        }

        return $this->_dbTable;
    }

    public function save(Application_Model_Address $address)
    {
        $data = $address->toArray();
        
        if (null === $address->getId()) {
            return $this->getDbTable()->insert($data);
        }
        
        return $this->getDbTable()->update($data, $address->getId());
    }

    public function find($id)
    {
        $result = $this->getDbTable()->find($id);

        if (0 === count($result)) {
            return null;
        }
        
        $row = $result->current();
        
        return new Application_Model_Address($row->toArray());
    }

    public function fetchAll()
    {
        $result = $this->getDbTable()->fetchAll();
        $addresses = array();
        
        foreach ($result as $row) {
            $addresses[] = new Application_Model_Address($row->toArray());
        }
        
        return $addresses;
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

