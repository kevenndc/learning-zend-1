<?php

class Application_Model_UserMapper extends Application_Model_ModelMapperAbstract
{
    
    /**
     * @return Application_Model_DbTable_User
     * @throws Exception
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_User');
        }
        
        return $this->_dbTable;
    }
    
    public function save(Application_Model_User $user)
    {
        $data       = $user->toArray();
        $result     = $this->getDbTable()->find($user->getEmployeeId());
        
        if (!count($result)) {
            return $this->getDbTable()->insert($data);
        }
        
        return $this->getDbTable()->update($data, $user->getEmployeeId());
    }
    
    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        
        if (0 === count($result)) {
            return null;
        }
        
        $row = $result->current();
        
        return new Application_Model_Person($row->toArray());
    }
    
    public function fetchAll()
    {
        $result = $this->getDbTable()->fetchAll();
        $users  = array();
        
        foreach ($result as $row) {
            $users[] = new Application_Model_User($row->toArray());
        }
        
        return $users;
    }
    
    public function delete($id)
    {
        $result = $this->getDbTable()->find($id);
        
        if (0 === count($result)) {
            return false;
        }
        
        $row = $result->current();
        
        return (bool) $row->delete();
    }

}

