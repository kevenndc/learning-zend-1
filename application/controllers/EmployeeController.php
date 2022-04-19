<?php

class EmployeeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {
        $request            = $this->getRequest();
        $form               = new Application_Form_Employee();
        $this->view->form   = $form;
        
        if ($request->isGet()) {
            return true;
        }
        
        if ($form->isValid($request->getPost())) {
            $person = $this->savePerson($form);
            $this->saveEmployee($form, $person);
            
            return $this->_helper->redirector('index');
        }
        
        return false;
    }
    
    private function savePerson(Application_Form_Employee $form)
    {
        $person         = new Application_Model_Person($form->getValue('person'));
        $personMapper   = new Application_Model_PersonMapper();
        $personId       = $personMapper->save($person);
        
        $person->setId($personId);
        
        return $person;
    }

    private function saveEmployee(Application_Form_Employee $form, Application_Model_Person $person)
    {
        $employee       = new Application_Model_Employee($form->getValue('employee'));
        $employeeMapper = new Application_Model_EmployeeMapper();
        
        $employee->setPersonId($person->getId());
        $employeeMapper->save($employee);
        
        return $employee;
    }

}



