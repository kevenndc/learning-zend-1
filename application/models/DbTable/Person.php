<?php

class Application_Model_DbTable_Person extends Zend_Db_Table_Abstract
{
    
    protected $_name = 'persons';
    
    public function getName()
    {
        return $this->_name;
    }
    
}

