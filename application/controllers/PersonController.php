<?php

class PersonController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function signAction()
    {
        $request    = $this->getRequest();
        $form       = new Application_Form_Person();

        if ($request->isGet()) {
            $this->view->form = $form;
            return;
        }

        if ($form->isValid($request->getPost())) {
            $person = new Application_Model_Person($form->getValues());
            $mapper = new Application_Model_PersonMapper();
            $mapper->save($person);

            return $this->_helper->redirector('index');
        }
    }

    public function showAction()
    {
        $id     = $this->getParam('id');
        $mapper = new Application_Model_PersonMapper();
        $person = $mapper->find($id);

        $this->view->person = $person;
    }

    public function deleteAction()
    {
        $id     = $this->getParam('id');
        $mapper = new Application_Model_PersonMapper();
        $person = $mapper->delete($id);

        return $this->_helper->redirector('index');
    }

}




