<?php

class Application_Model_EmployeeMapper extends Application_Model_ModelMapperAbstract
{
    
    /**
     * @return Application_Model_DbTable_Employee
     * @throws Exception
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Employee');
        }
        
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Employee $employee)
    {
        $data   = $employee->toArray();
        $result = $this->getDbTable()->find($employee->getPersonId());
        
        if (0 === count($result)) {
            return $this->getDbTable()->insert($data);
        }
        
        return $this->getDbTable()->update($data, $employee->getPersonId());
    }
    
    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        
        if (!count($result)) {
            return null;
        }
        
        $row = $result->current();
        
        return new Application_Model_Employee($row->toArray());
    }
    
    public function fetchAll()
    {
        $result = $this->getDbTable()->fetchAll();
        $employees = array();
        
        foreach ($result as $row) {
            $employees[] = new Application_Model_Employee($row->toArray());
        }
        
        return $employees;
    }
    
    public function delete($id)
    {
        $employee = $this->find($id);
        
        if (null === $employee) {
            return false;
        }
        
        if (null !== $employee->getAddressId()) {
            $addressMapper = new Application_Model_AddressMapper();
            $addressMapper->delete($employee->getAddressId());
        }
        
        return (bool) $this->getDbTable()->delete($employee->getPersonId());
    }
}

