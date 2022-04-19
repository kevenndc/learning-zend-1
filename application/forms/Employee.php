<?php

class Application_Form_Employee extends Zend_Form
{
    
    public function init()
    {
        $this->setMethod('POST');
        
        $personForm = new Application_Form_Person();
        $this->addSubForm($personForm, 'person');
        
        $employeeForm = new Zend_Form_SubForm();
        
        $employeeForm->addElement('text', 'position', array(
            'label'         => 'Position',
            'required'      => true,
            'validators'    => array(
                new Zend_Validate_StringLength(array(5, 60))
            )
        ));
    
        $this->addSubForm($employeeForm, 'employee');
        
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Submit',
        ));

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
        
    }
    
    public function loadDefaultDecorators()
    {
        parent::loadDefaultDecorators();
        
        foreach ($this->getSubForms() as $subForm) {
            $subForm->removeDecorator('DtDdWrapper');
        }
    }


}

