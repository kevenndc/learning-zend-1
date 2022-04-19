<?php

class AddressController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //var_dump(APPLICATION_PATH . '/../library/Support');
        $mapper = new Application_Model_AddressMapper();
        var_dump($mapper->find(1));;
    }


}

