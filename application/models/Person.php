<?php

class Application_Model_Person
{
    protected $_id;
    protected $_name;
    protected $_email;
    protected $_phone;
    protected $_cpf;

    /**
     * @param Zend_Db_Table_Row_Abstract $row
     * @return Application_Model_Person
     */
    public static function buildFromDbTableRow($row)
    {
        return (new static())
            ->setId($row->id)
            ->setCpf($row->cpf)
            ->setName($row->name)
            ->setEmail($row->email)
            ->setPhone($row->phone);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->_cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->_cpf = $cpf;
        return $this;
    }
}

