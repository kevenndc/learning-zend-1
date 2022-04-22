<?php

class Application_Model_User extends Application_Model_ModelAbstract
{

    protected $_employeeId;
    protected $_username;
    protected $_password;
    
    /**
     * @return int
     */
    public function getEmployeeId()
    {
        return $this->_employeeId;
    }
    
    /**
     * @param int $employeeId
     * @return Application_Model_User
     */
    public function setEmployeeId($employeeId)
    {
        $this->_employeeId = $employeeId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }
    
    /**
     * @param string $username
     * @return Application_Model_User
     */
    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }
    
    /**
     * @param string $password
     * @return Application_Model_User
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }
    
    public function toArray()
    {
        return array(
            'employee_id'   => $this->getEmployeeId(),
            'username'      => $this->getUsername(),
            'password'      => $this->getPassword(),
        );
    }
    
}

